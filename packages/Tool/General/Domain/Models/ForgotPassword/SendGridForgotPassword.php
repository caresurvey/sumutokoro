<?php

namespace Tool\General\Domain\Models\ForgotPassword;

use Tool\General\Exceptions\GeneralLogicException;

class SendGridForgotPassword
{
    private ForgotPassword $forgotPassword;

    public function __construct(ForgotPassword $forgotPassword)
    {
        $this->forgotPassword = $forgotPassword;
    }

    public function sendMail()
    {
        // メールを送信する
        try {
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom($this->forgotPassword->getFromEmail());
            $email->setSubject($this->forgotPassword->getSubject());
            $email->addTo($this->forgotPassword->getToEmail());
            $sendGrid = new \SendGrid($this->forgotPassword->getApiKey());
            $email->addContent("text/plain", $this->forgotPassword->getText());
            $response = $sendGrid->send($email);

            if ($response->statusCode() !== 202) {
                throw new GeneralLogicException('メールを送信できませんでした');
            }

            // 成功したらtrueを返す
            return true;
        } catch (GeneralLogicException $e) {
            // エラーを書き込む
            Logger($e->getMessage());
            // 失敗したらfalseを返す
            return false;
        }
    }
}
