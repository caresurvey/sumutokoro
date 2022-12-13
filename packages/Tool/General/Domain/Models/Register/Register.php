<?php

namespace Tool\General\Domain\Models\Register;

class Register
{
    private array $data;
    private bool $isAdmin;

    public function __construct(array $data, bool $isAdmin)
    {
        $this->data = $data;
        $this->isAdmin = $isAdmin;
    }

    public function getName(): string
    {
        return $this->data['name'];
    }

    public function getKana(): string
    {
        return $this->data['kana'];
    }

    public function getTel(): string
    {
        return $this->data['tel1'] . '-' . $this->data['tel2'] . '-' . $this->data['tel3'];
    }

    public function getTel1(): string
    {
        return $this->data['tel1'];
    }

    public function getTel2(): string
    {
        return $this->data['tel2'];
    }

    public function getTel3(): string
    {
        return $this->data['tel3'];
    }

    public function getEmail(): string
    {
        return $this->data['email'];
    }

    public function getPassword(): string
    {
        return $this->data['password'];
    }

    public function getPasswordConfirm(): string
    {
        return $this->data['password_confirm'];
    }

    public function getUserType(): string
    {
        return $this->data['user_types'][$this->getUserTypeId()];
    }

    public function getUserTypeId(): int
    {
        return $this->data['user_type_id'];
    }

    public function getJobType(): string
    {
        return $this->data['job_types'][$this->getJobTypeId()];
    }

    public function getJobTypeId(): int
    {
        return $this->data['job_type_id'];
    }

    public function getCompany(): string
    {
        return $this->data['company'];
    }

    public function getMsg(): string
    {
        return $this->data['msg'];
    }

    public function getFromEmail(): string
    {
        return config('myapp.mail_from');
    }

    public function getToEmail(): string
    {
        if(!$this->isAdmin) return $this->getToEmailForCustomer();

        return $this->getToEmailForAdmin();
    }

    public function getToEmailForAdmin(): string
    {
        return config('myapp.mail_admin');
    }

    public function getToEmailForCustomer(): string
    {
        return $this->getEmail();
    }

    public function getSubject(): string
    {
        if(!$this->isAdmin) return $this->getSubjectForCustomer();

        return $this->getSubjectForAdmin();
    }

    public function getSubjectForAdmin(): string
    {
        return 'ユーザー登録受信｜すむところ.com';
    }

    public function getSubjectForCustomer(): string
    {
        return 'ユーザー登録完了｜すむところ.com';
    }

    public function getApiKey(): string
    {
        return env('SENDGRID_API_KEY');
    }

    public function getText(): string
    {
        if(!$this->isAdmin) return $this->getTextForCustomer();

        return $this->getTextForAdmin();
    }

    public function getTextForAdmin(): string
    {
        $result = '━━━━━━━━━━━━━━━━━' . "\n";
        $result .= 'ユーザー登録を受付致しました' . "\n";
        $result .= config('myapp.site_name') . "\n";
        $result .= '━━━━━━━━━━━━━━━━━' . "\n\n";
        $result .= '運営管理者様へ' . "\n\n";
        $result .= 'Webサイトにてユーザー登録がありました。' . "\n";
        $result .= '対応をお願いいたします。' . "\n";
        $result .= '========================' . "\n";
        $result .= '受付日時 ' . date("Y年m月d日 H時i分") . "\n";
        $result .= 'お問い合わせ内容' . "\n";
        $result .= 'お名前：' . $this->getName() . "様\n";
        $result .= 'ふりがな：' . $this->getKana() . "様\n";
        $result .= 'お電話番号：' . $this->getTel() . "\n";
        $result .= 'メールアドレス：' . $this->getEmail() . "\n";
        $result .= 'ユーザータイプ：' . $this->getUserType() . "\n";
        $result .= '職種：' . $this->getJobType() . "\n";
        $result .= '所属事業所：' . $this->getCompany() . "\n";
        $result .= 'お問い合わせ内容：' . $this->getMsg() . "\n";
        $result .= "\n\n";
        $result .= '--------------------------' . "\n";
        $result .= '老人ホーム・介護施設をさがすなら' . "\n";
        $result .= 'すむところ.com' . "\n\n";
        $result .= 'https://sumutokoro.com' . "\n";
        $result .= '--------------------------' . "\n";

        return $result;
    }

    public function getTextForCustomer(): string
    {
        $result = '━━━━━━━━━━━━━━━━━' . "\n";
        $result .= 'ユーザー登録を受付致しました' . "\n";
        $result .= config('myapp.site_name') . "\n";
        $result .= '━━━━━━━━━━━━━━━━━' . "\n\n";
        $result .= $this->getName() . '様' . "\n\n";
        $result .= 'ありがとうございました、ユーザー登録が完了致しました。' . "\n";
        $result .= 'この後運営が承認許可作業を行います。' . "\n";
        $result .= '管理できる事業所との紐付けなどを行いますので、' . "\n";
        $result .= '少々お待ちくださいませ。' . "\n";
        $result .= '========================' . "\n";
        $result .= '受付日時 ' . date("Y年m月d日 H時i分") . "\n";
        $result .= 'お問い合わせ内容' . "\n";
        $result .= 'お名前：' . $this->getName() . "様\n";
        $result .= 'ふりがな：' . $this->getKana() . "様\n";
        $result .= 'お電話番号：' . $this->getTel() . "\n";
        $result .= 'メールアドレス：' . $this->getEmail() . "\n";
        $result .= 'ユーザータイプ：' . $this->getUserType() . "\n";
        $result .= '職種：' . $this->getJobType() . "\n";
        $result .= '所属事業所：' . $this->getCompany() . "\n";
        $result .= 'お問い合わせ内容：' . $this->getMsg() . "\n";
        $result .= "\n\n";
        $result .= '--------------------------' . "\n";
        $result .= '老人ホーム・介護施設をさがすなら' . "\n";
        $result .= 'すむところ.com' . "\n\n";
        $result .= 'https://sumutokoro.com' . "\n";
        $result .= '--------------------------' . "\n";

        return $result;
    }

    public function getResponse(bool $isPassed): array
    {
        if($isPassed) return $this->getSuccessResponse();

        return $this->getFailedResponse();
    }

    public function getSuccessResponse(): array
    {
        return [
            'title' => $this->getSuccessTitle(),
            'message' => $this->getSuccessMessage(),
            'result' => true,
        ];
    }

    public function getFailedResponse(): array
    {
        return [
            'title' => $this->getFailedTitle(),
            'message' => $this->getFailedMessage(),
            'result' => false,
        ];
    }

    public function getSuccessTitle(): string
    {
        return 'ユーザー登録完了';
    }

    public function getFailedTitle(): string
    {
        return 'ユーザー登録できませんでした';
    }

    public function getSuccessMessage(): string
    {
        return 'ありがとうございました、ユーザー登録が完了致しました。' . "\n" . 
            'この後運営が承認許可作業を行います。' . "\n";
            '管理できる事業所との紐付けなどを行いますので、' . "\n";
            '少々お待ちくださいませ。';
    }

    public function getFailedMessage(): string
    {
        return '申し訳ありません、ユーザー登録ができませんでした。';
    }
}
