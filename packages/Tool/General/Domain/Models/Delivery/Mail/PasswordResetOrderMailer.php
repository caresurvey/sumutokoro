<?php

namespace Tool\General\Domain\Models\Delivery\Mail;

use Tool\Common\Domain\Models\Delivery\Mail\CheckTestMode;
use Illuminate\Support\Facades\Mail;

class PasswordResetOrderMailer
{
    private $checkTestMode;

    public function __construct(CheckTestMode $checkTestMode)
    {
        $this->checkTestMode = $checkTestMode;
    }

    /**
     * メールを送信する
     * @param PasswordResetOrderMail $passwordResetOrderMail
     * @param string $email
     * @return bool|void
     */
    public function to(PasswordResetOrderMail $passwordResetOrderMail, string $email, string $token): bool
    {
        // 入力されたメールアドレスでテストモードかどうか判定し、もしそうなら何もせずに処理を終える
        if ($this->checkTestMode->checkTest($email)) return true;

        // メールを送信する
        Mail::to($email,'')->send($passwordResetOrderMail);

        // 問題なければtrueを返す
        return true;
    }
}
