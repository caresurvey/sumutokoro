<?php

namespace Tool\General\Application\UseCases\Register;

use Tool\General\Domain\Models\Common\LogicResponse;
use Tool\General\Domain\Models\Common\ResponseRepository;
use Tool\General\Domain\Models\Register\RegisterRepository;
use Tool\General\Application\Requests\Register\StoreRequest;
use Tool\General\Exceptions\GeneralLogicException;
use Tool\General\Infrastructure\Eloquents\EloquentJobType;
use Tool\General\Infrastructure\Eloquents\EloquentUserType;

class StoreUseCase
{
    private StoreRequest $request;
    private RegisterRepository $registerRepo;
    private ResponseRepository $responseRepo;
    private EloquentJobType $eloquentJobType;
    private EloquentUserType $eloquentUserType;

    public function __construct(
        EloquentJobType $eloquentJobType,
        EloquentUserType $eloquentUserType,
        ResponseRepository $responseRepo,
        RegisterRepository $registerRepo,
        StoreRequest $request
    )
    {
        $this->eloquentJobType = $eloquentJobType;
        $this->eloquentUserType = $eloquentUserType;
        $this->request = $request;
        $this->responseRepo = $responseRepo;
        $this->registerRepo = $registerRepo;
    }

    public function __invoke(): LogicResponse
    {
        // 二重送信防止
        $this->request->session()->regenerateToken();

        // テストモードかを判別するモードチェックオブジェクトを生成
        $checkModel = $this->registerRepo->makeCheckMode($this->request->all());

        // テストモードだったら何もせずに完了画面だけを表示させる
        if ($checkModel->checkTestMode()) {
            return $this->responseRepo->makeModel(true, $checkModel->getTitle(), $checkModel->getMessage());
        }

        try {
            // 職種リスト取得
            $job_types = $this->eloquentJobType->where('display', 1)->pluck('name', 'id')->toArray();

            // ユーザータイプリスト取得
            $user_types = $this->eloquentUserType->where('display', 1)->pluck('name', 'id')->toArray();

            // データ整形
            $user = $this->request->all()['user'];
            $user['job_types'] = $job_types;
            $user['user_types'] = $user_types;

            // データを保存して、失敗したら例外を投げる
            if(!$this->registerRepo->store($this->request->data())) throw new GeneralLogicException();

            // 管理者用メールオブジェクトを作成
            $registerForAdmin = $this->registerRepo->makeRegister($user, true);
            $sendRegisterForAdmin = $this->registerRepo->makeSendGridRegister($registerForAdmin);

            // メールを送信してエラーなら例外を投げる
            if(!$sendRegisterForAdmin->sendMail()) throw new GeneralLogicException();

            // 送信者用メールオブジェクトを作成してメールを送信
            $registerForCustomer = $this->registerRepo->makeRegister($user, false);
            $sendRegisterForCustomer = $this->registerRepo->makeSendGridRegister($registerForCustomer);

            // メールを送信してエラーなら例外を投げる
            if(!$sendRegisterForCustomer->sendMail()) throw new GeneralLogicException();

            // Responseを返す
            return $this->responseRepo->makeModel(true, $registerForAdmin->getSuccessTitle(), $registerForAdmin->getSuccessMessage());

        } catch(GeneralLogicException $e){

            // エラーを書き込む
            Logger($e->getMessage());

            // Responseを返す
            return $this->responseRepo->makeModel(true, $registerForAdmin->getFailedTitle(), $registerForAdmin->getFailedMessage());
        }
    }
}
