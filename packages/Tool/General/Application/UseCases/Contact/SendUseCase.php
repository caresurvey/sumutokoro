<?php

namespace Tool\General\Application\UseCases\Contact;

use Tool\General\Application\Requests\Contact\SendRequest;
use Tool\General\Domain\Models\Common\ResponseRepository;
use Tool\General\Domain\Models\Contact\ContactRepository;
use Tool\General\Domain\Models\Common\LogicResponse;
use Tool\General\Exceptions\GeneralLogicException;

class SendUseCase
{
    private ContactRepository $contactRepo;
    private SendRequest $request;
    private ResponseRepository $responseRepo;

    public function __construct(
        SendRequest        $request,
        ContactRepository  $contactRepo,
        ResponseRepository $responseRepo
    )
    {
        $this->contactRepo = $contactRepo;
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
        $checkModel = $this->contactRepo->makeCheckMode($this->request->all());

        // テストモードだったら何もせずに完了画面だけを表示させる
        if ($checkModel->checkTestMode()) {
            return $this->responseRepo->makeModel(true, $checkModel->getTitle(), $checkModel->getMessage());
        }

        try {
            // データを保存して、失敗したら例外を投げる
            if(!$this->contactRepo->store($this->request->all())) throw new GeneralLogicException();

            // 管理者用メールオブジェクトを作成
            $contactForAdmin = $this->contactRepo->makeContact($this->request->all(), true);
            $sendContactForAdmin = $this->contactRepo->makeSendGridContact($contactForAdmin);

            // メールを送信してエラーなら例外を投げる
            if(!$sendContactForAdmin->sendMail()) throw new GeneralLogicException();

            // 送信者用メールオブジェクトを作成してメールを送信
            $contactForCustomer = $this->contactRepo->makeContact($this->request->all(), false);
            $sendContactForCustomer = $this->contactRepo->makeSendGridContact($contactForCustomer);

            // メールを送信してエラーなら例外を投げる
            if(!$sendContactForCustomer->sendMail()) throw new GeneralLogicException();

            // Responseを返す
            return $this->responseRepo->makeModel(true, $contactForAdmin->getSuccessTitle(), $contactForAdmin->getSuccessMessage());

        } catch(GeneralLogicException $e) {

            // エラーを書き込む
            Logger($e->getMessage());

            // Responseを返す
            return $this->responseRepo->makeModel(true, $contactForAdmin->getFailedTitle(), $contactForAdmin->getFailedMessage());
        }
    }
}
