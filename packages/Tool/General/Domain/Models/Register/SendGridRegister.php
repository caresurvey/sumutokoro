<?php

namespace Tool\General\Domain\Models\Register;

use Tool\General\Exceptions\GeneralLogicException;

class SendGridRegister
{
    private Register $register;

    public function __construct(Register $register)
    {
        $this->register = $register;
    }

    public function sendMail()
    {
        // メールを送信する
        try {
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom($this->register->getFromEmail());
            $email->setSubject($this->register->getSubject());
            $email->addTo($this->register->getToEmail());
            $sendGrid = new \SendGrid($this->register->getApiKey());
            $email->addContent("text/plain", $this->register->getText());
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
