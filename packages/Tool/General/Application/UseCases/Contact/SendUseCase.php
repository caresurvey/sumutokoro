<?php

namespace Tool\General\Application\UseCases\Contact;

use Tool\General\Application\Requests\Contact\SendRequest;
use Tool\General\Domain\Models\Common\ResponseRepository;
use Tool\General\Domain\Models\Contact\ContactRepository;
use Tool\General\Domain\Models\Common\LogicResponse;

class SendUseCase
{
    private ContactRepository $contactRepo;
    private SendRequest $request;
    private ResponseRepository $responseRepo;

    public function __construct(
        SendRequest $request,
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
        // テストモードかを判別するモードチェックオブジェクトを生成
        $checkModel = $this->contactRepo->makeCheckMode($this->request->all());

        // テストモードだったら何もせずに完了画面だけを表示させる
        if($checkModel->checkTestMode()) {
            // 完了画面のデータ作成
            $data['title'] = 'テストモード完了';
            $data['message'] = 'テストモードでの処理を行いました。<br>フォームは無事に作動しています。<br>（保存もメール送信もされません）';

            // Responseを返す
            return $this->responseRepo->makeModel(true, $data['title'], $data['message'], $data);
        }

        // データを保存
        $this->contactRepo->store($this->request->all());

        // 送信用メールオブジェクトを作成
        $sendContact = $this->contactRepo->makeSendContact();

        // 完了画面のデータ作成
        $data['title'] = 'お問い合わせ完了';
        $data['message'] = 'ありがとうございました、お問い合わせが完了致しました。<br>ご返答いたしますので、少々お待ちくださいませ。';

        // 管理者用へメール送信
        $mailContactForAdmin = $this->contactRepo->makeMailContactForAdmin($this->request->all()['contact']);
        $sendContact->sendMailForAdmin($mailContactForAdmin);

        // ユーザーへメール送信
        $mailContactForCustomer = $this->contactRepo->makeMailContactForCustomer($this->request->all()['contact']);
        $sendContact->sendMailForCustomer($mailContactForCustomer);

        // Responseを返す
        return $this->responseRepo->makeModel(true, $data['title'], $data['message']);
    }
}
