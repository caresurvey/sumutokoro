<?php

namespace Tool\General\Domain\Models\Contact;

use Illuminate\Support\Facades\Mail;
use Tool\General\Exceptions\GeneralLogicException;

class SendContact
{
    public function sendMailForAdmin(MailContactForAdmin $mailContact)
    {
        // メールを送信する
        try {
            if (config('app.env') === 'production' || config('app.env') === 'staging') {
                Mail::to(config('myapp.mail_admin'))->send($mailContact);
            }
            // 成功したらtrueを返す
            return true;
        } catch (\Exception $e) {
            Logger($e->getMessage());
            throw new GeneralLogicException('送信できませんでした');
        }
    }

    public function sendMailForCustomer(MailContactForCustomer $mailContact)
    {
        // メールを送信する
        try {
            if (config('app.env') === 'production' || config('app.env') === 'staging') {
                Mail::to($mailContact->data()['email'])->send($mailContact);
            }
            // 成功したらtrueを返す
            return true;
        } catch (\Exception $e) {
            Logger($e->getMessage());
            throw new GeneralLogicException('送信できませんでした');
        }
    }
}
