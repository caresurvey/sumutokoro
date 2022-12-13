<?php

namespace Tool\General\Domain\Models\Contact;

use Tool\General\Exceptions\GeneralLogicException;

class SendGridContact
{
    private Contact $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function sendMail()
    {
        // メールを送信する
        try {
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom($this->contact->getFromEmail());
            $email->setSubject($this->contact->getSubject());
            $email->addTo($this->contact->getToEmail());
            $sendGrid = new \SendGrid($this->contact->getApiKey());
            $email->addContent("text/plain", $this->contact->getText());
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
