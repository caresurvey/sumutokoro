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
        if($checkModel->checkTestMode()) {
            // 完了画面のデータ作成
            $data['title'] = 'テストモード完了';
            $data['message'] = 'テストモードでの処理を行いました。<br>フォームは無事に作動しています。<br>（保存もメール送信もされません）';

            // Responseを返す
            return $this->responseRepo->makeModel(true, $data['title'], $data['message']);
        }

        try {
            // データを保存
            if(!$this->registerRepo->store($this->request->data())) throw new GeneralLogicException();

            // 職種リスト取得
            $job_types = $this->eloquentJobType->where('display', 1)->pluck('name', 'id')->toArray();

            // ユーザータイプリスト取得
            $user_types = $this->eloquentUserType->where('display', 1)->pluck('name', 'id')->toArray();

            // 送信用メールオブジェクトを作成
            $sendRegister = $this->registerRepo->makeSendRegister();

            // データ整形
            $user = $this->request->all()['user'];
            $user['job_types'] = $job_types;
            $user['user_types'] = $user_types;

            // 完了画面のデータ作成
            $data['title'] = 'ユーザー登録完了';
            $data['message'] = 'ありがとうございました、ユーザー登録が完了致しました。<br>この後運営が承認許可作業を行います。<br>管理できる事業所との紐付けなどを行いますので、<br>少々お待ちくださいませ。';

            // 管理者用へメール送信
            $mailRegisterForAdmin = $this->registerRepo->makeMailRegisterForAdmin($user);
            if(!$sendRegister->sendMailForAdmin($mailRegisterForAdmin)) throw new GeneralLogicException();

            // ユーザーへメール送信
            $mailRegisterForCustomer = $this->registerRepo->makeMailRegisterForCustomer($user);
            if(!$sendRegister->sendMailForCustomer($mailRegisterForCustomer)) throw new GeneralLogicException();

            // Responseを返す
            return $this->responseRepo->makeModel(true, $data['title'], $data['message']);

        } catch(GeneralLogicException $e){
            // エラー書き込み
            Logger($e->getMessage());
            // Responseを返す
            return $this->responseRepo->makeModel(true, '登録ができませんでした', 'ユーザー登録ができませんでした、大変申し訳ありませんがもう一度やり直してください');
        }
    }
}
