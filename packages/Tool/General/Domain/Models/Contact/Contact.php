<?php

namespace Tool\General\Domain\Models\Contact;

class Contact
{
    private array $data;
    private bool $isAdmin;

    public function __construct(array $data, bool $isAdmin)
    {
        $this->data = $data['contact'];
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

    public function getEmail(): string
    {
        return $this->data['email'];
    }

    public function getTel(): string
    {
        return $this->data['tel'];
    }

    public function getReply(): string
    {
        return $this->data['reply'];
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
        return 'お問い合わせ受信｜すむところ.com';
    }

    public function getSubjectForCustomer(): string
    {
        return 'お問い合わせ完了｜すむところ.com';
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
        $result .= 'Webサイトからお問い合わせを受け付けました。' . "\n";
        $result .= '━━━━━━━━━━━━━━━━━' . "\n\n";
        $result .= '運営管理者様へ' . "\n\n";
        $result .= 'Webサイトからお問い合わせを受け取りました。' . "\n";
        $result .= '対応をお願いいたします。' . "\n";
        $result .= '========================' . "\n";
        $result .= 'お問い合わせ内容' . "\n";
        $result .= 'お名前：' . $this->getName() . "様\n";
        $result .= 'ふりがな：' . $this->getKana() . "様\n";
        $result .= 'メールアドレス：' . $this->getEmail() . "\n";
        $result .= 'お電話番号：' . $this->getTel() . "\n";
        $result .= '返答方法：' . $this->getReply() . "\n";
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
        $result .= 'お問い合わせありがとうございました。' . "\n";
        $result .= '━━━━━━━━━━━━━━━━━' . "\n\n";
        $result .= $this->getName() . '様' . "\n\n";
        $result .= 'Webサイトからお問い合わせをお受け致しました。' . "\n";
        $result .= 'ご返答いたしますので、少々お待ち下さい。' . "\n";
        $result .= 'もし2日間以上たっても返信がない場合はなにかしらのエラーが考えられますので' . "\n";
        $result .= '大変お手数ですが再度お問い合わせくださいませ' . "\n";
        $result .= '========================' . "\n";
        $result .= 'お問い合わせ内容' . "\n";
        $result .= 'お名前：' . $this->getName() . "様\n";
        $result .= 'ふりがな：' . $this->getKana() . "様\n";
        $result .= 'メールアドレス：' . $this->getEmail() . "\n";
        $result .= 'お電話番号：' . $this->getTel() . "\n";
        $result .= '返答方法：' . $this->getReply() . "\n";
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
        return 'お問い合わせ完了';
    }

    public function getFailedTitle(): string
    {
        return 'お問い合わせできませんでした';
    }

    public function getSuccessMessage(): string
    {
        return 'ありがとうございました、お問い合わせが完了致しました。' . "\n" . 'ご返答いたしますので、少々お待ちくださいませ。';
    }

    public function getFailedMessage(): string
    {
        return '申し訳ありません、お問い合わせできませんでした。';
    }
}
