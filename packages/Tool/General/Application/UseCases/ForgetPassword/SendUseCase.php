<?php

namespace Tool\General\Application\UseCases\ForgetPassword;

use Tool\General\Application\Requests\ForgotPassword\SendRequest;
use Tool\General\Domain\Models\Common\ResponseRepository;
use Tool\General\Domain\Models\ForgotPassword\ForgotPasswordRepository;
use Tool\General\Domain\Models\Common\LogicResponse;
use Tool\General\Exceptions\GeneralLogicException;

class SendUseCase
{
    private ForgotPasswordRepository $forgotPasswordRepo;
    private SendRequest $request;
    private ResponseRepository $responseRepo;

    public function __construct(
        SendRequest              $request,
        ForgotPasswordRepository $forgotPasswordRepo,
        ResponseRepository       $responseRepo
    )
    {
        $this->forgotPasswordRepo = $forgotPasswordRepo;
        $this->request = $request;
        $this->responseRepo = $responseRepo;
    }

    /**
     * @return LogicResponse
     */
    public function __invoke(): LogicResponse
    {
        // 二重送信防止
        $this->request->session()->regenerateToken();

        // テストモードかを判別するモードチェックオブジェクトを生成
        $checkModel = $this->forgotPasswordRepo->makeCheckMode($this->request->all());

        // テストモードだったら何もせずに完了画面だけを表示させる
        if ($checkModel->checkTestMode()) {
            return $this->responseRepo->makeModel(true, $checkModel->getTitle(), $checkModel->getMessage());
        }

        try {
            // トークン発行
            $token = $this->forgotPasswordRepo->makeToken($this->request->getEmail());

            // データを保存して、失敗したら例外を投げる
            if (!$this->forgotPasswordRepo->store($this->request->getEmail(), $token)) throw new GeneralLogicException();

            // 送信者用メールオブジェクトを作成してメールを送信
            $forgotPasswordForCustomer = $this->forgotPasswordRepo->makeForgotPassword($this->request->getEmail(), $token);
            $sendForgetPasswordForCustomer = $this->forgotPasswordRepo->makeSendGridForgotPassword($forgotPasswordForCustomer);

            // メールを送信してエラーなら例外を投げる
            if (!$sendForgetPasswordForCustomer->sendMail()) throw new GeneralLogicException();

            // Responseを返す
            return $this->responseRepo->makeModel(true, $forgotPasswordForCustomer->getSuccessTitle(), $forgotPasswordForCustomer->getSuccessMessage());

        } catch (GeneralLogicException $e) {

            // エラーを書き込む
            Logger($e->getMessage());

            // Responseを返す
            return $this->responseRepo->makeModel(true, $forgotPasswordForCustomer->getFailedTitle(), $forgotPasswordForCustomer->getFailedMessage());
        }
    }
}
