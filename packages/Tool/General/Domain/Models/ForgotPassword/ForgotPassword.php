<?php

namespace Tool\General\Domain\Models\ForgotPassword;

class ForgotPassword
{
    private string $email;
    private string $token;

    public function __construct(string $email, string $token)
    {
        $this->email = $email;
        $this->token = $token;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getEncodeToken(): string
    {
        return base64_encode($this->token);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFromEmail(): string
    {
        return config('myapp.mail_from');
    }

    public function getToEmail(): string
    {
        return $this->getEmail();
    }

    public function getSubject(): string
    {
        return 'パスワードリセット｜すむところ.com';
    }

    public function getApiKey(): string
    {
        return env('SENDGRID_API_KEY');
    }

    public function getText(): string
    {
        return $this->getTextForCustomer();
    }

    public function getTextForCustomer(): string
    {
        $result = '━━━━━━━━━━━━━━━━━' . "\n";
        $result .= 'パスワードリセットメール' . "\n";
        $result .= '━━━━━━━━━━━━━━━━━' . "\n\n";
        $result .= 'パスワードリセットのメールです。' . "\n";
        $result .= '以下のURLをクリックして、パスワードのリセット（再設定）を行って下さい。' . "\n";
        $result .= '尚、1時間経つとこのURLは無効となりますので、' . "\n";
        $result .= 'その場合は再度申請してください。' . "\n\n";
        $result .= 'また、このメールに覚えのない場合は間違いの可能性がありますので、' . "\n";
        $result .= '大変お手数ですがこのまま破棄してください。';
        $result .= '========================' . "\n\n";
        $result .= config('myapp.app_url') . '/password/reset/' . $this->getEncodeToken() . "\n\n";
        $result .= '--------------------------' . "\n";
        $result .= '老人ホーム・介護施設をさがすなら' . "\n";
        $result .= 'すむところ.com' . "\n\n";
        $result .= 'https://sumutokoro.com' . "\n";
        $result .= '--------------------------' . "\n";

        return $result;
    }

    public function getResponse(bool $isPassed): array
    {
        if ($isPassed) return $this->getSuccessResponse();

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
        return 'パスワードリセット申請完了';
    }

    public function getFailedTitle(): string
    {
        return 'パスワードリセット申請ができませんでした';
    }

    public function getSuccessMessage(): string
    {
        return 'パスワードリセット申請を完了しました。' . "\n" . '入力したメールアドレスにリセット画面のURLをお送りしておりますので、' . "\n" . 'メールボックスをご確認ください。';
    }

    public function getFailedMessage(): string
    {
        return '申し訳ありません、パスワードリセット申請ができませんでした。';
    }
}
