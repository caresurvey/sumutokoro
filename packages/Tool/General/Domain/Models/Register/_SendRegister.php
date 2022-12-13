<?php

namespace Tool\General\Domain\Models\Register;

use Illuminate\Support\Facades\Mail;
use Tool\General\Exceptions\GeneralLogicException;

class SendRegister
{
    public function sendMailForAdmin(MailRegisterForAdmin $mailUser)
    {
        // メールを送信する
        try {
            if (config('app.env') === 'production' || config('app.env') === 'staging') {
                Mail::to(config('myapp.mail_admin'))->send($mailUser);
            }
            // 成功したらtrueを返す
            return true;
        } catch (\Exception $e) {
            Logger($e->getMessage());
            throw new GeneralLogicException('送信できませんでした');
        }
    }

    public function sendMailForCustomer(MailRegisterForCustomer $mailUser)
    {
        // メールを送信する
        try {
            if (config('app.env') === 'production' || config('app.env') === 'staging') {
                Mail::to($mailUser->data()['email'])->send($mailUser);
            }
            // 成功したらtrueを返す
            return true;
        } catch (\Exception $e) {
            Logger($e->getMessage());
            throw new GeneralLogicException('送信できませんでした');
        }
    }
}
