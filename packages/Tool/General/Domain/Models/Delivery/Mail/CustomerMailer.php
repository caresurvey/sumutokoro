<?php

namespace Tool\General\Domain\Models\Delivery\Mail;

use App\Domain\Models\Common\Delivery\Mail\CheckTestMode;
use App\Domain\Models\General\Assign\AssignConfirm;
use Illuminate\Support\Facades\Mail;

class CustomerMailer
{
    private $checkTestMode;

    public function __construct(CheckTestMode $checkTestMode)
    {
        $this->checkTestMode = $checkTestMode;
    }

    /**
     * メールを送信する
     * @param CustomerMail $customerMail
     * @param AssignConfirm $assignConfirm
     * @return bool|void
     */
    public function to(CustomerMail $customerMail, AssignConfirm $assignConfirm): bool
    {
        // 入力されたメールアドレスでテストモードかどうか判定し、もしそうなら何もせずに処理を終える
        if ($this->checkTestMode->checkTest($assignConfirm->customer_email())) return true;

        // メールを送信する
        Mail::to($assignConfirm->customer_email(), $assignConfirm->customer_name())->send($customerMail);

        // 問題なければtrueを返す
        return true;
    }
}
