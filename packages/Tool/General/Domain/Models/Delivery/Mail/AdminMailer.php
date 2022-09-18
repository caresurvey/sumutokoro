<?php

namespace Tool\General\Domain\Models\Delivery\Mail;

use Tool\Common\Domain\Models\Delivery\Mail\CheckTestMode;
use Illuminate\Support\Facades\Mail;

class AdminMailer
{
    private $checkTestMode;

    public function __construct(CheckTestMode $checkTestMode)
    {
        $this->checkTestMode = $checkTestMode;
    }

    /**
     * メールを送信する
     * @param AdminMail $adminMail
     * @return bool
     */
    public function to(AdminMail $adminMail, array $request): bool
    {
        // 入力されたメールアドレスでテストモードかどうか判定し、もしそうなら何もせずに処理を終える
        //if ($this->checkTestMode->checkTest($request['email'])) return true;

        // メールを送信する
        Mail::to($adminMail->getAdminEmail(), $adminMail->getAdminName())->send($adminMail);

        // 問題なければtrueを返す
        return true;
    }
}
