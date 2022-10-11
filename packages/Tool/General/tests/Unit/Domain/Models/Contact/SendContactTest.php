<?php

namespace Tool\General\tests\Unit\Domain\Models\Contact;

use Tests\TestCase;
use Tool\General\Domain\Models\Contact\MailContactForAdmin;
use Tool\General\Domain\Models\Contact\MailContactForCustomer;
use Tool\General\Domain\Models\Contact\SendContact;

class SendContactTest extends TestCase
{
    /**
     * Test
     *
     * @return void
     */
    public function testSendMailForAdmin()
    {
        // データセット
        $data['name'] = 'お名前';
        $data['kana'] = 'ふりがな';
        $data['email'] = 'test@test.co.jp';
        $data['tel'] = '012-345-6789';
        $data['reply'] = 'ご返答方法';
        $data['msg'] = 'お問い合わせ内容';
        $mailContactForAdmin = new MailContactForAdmin($data);

        // テストするクラスを読み込み
        $sendContact = new SendContact();

        // 検証
        $this->assertTrue($sendContact->sendMailForAdmin($mailContactForAdmin));
    }

    /**
     * Test
     *
     * @return void
     */
    public function testSendMailForCustomer()
    {
        // データセット
        $data['name'] = 'お名前';
        $data['kana'] = 'ふりがな';
        $data['email'] = 'test@test.co.jp';
        $data['tel'] = '012-345-6789';
        $data['reply'] = 'ご返答方法';
        $data['msg'] = 'お問い合わせ内容';
        $mailContactForCustomer = new MailContactForCustomer($data);

        // テストするクラスを読み込み
        $sendContact = new SendContact();

        // 検証
        $this->assertTrue($sendContact->sendMailForCustomer($mailContactForCustomer));
    }
}
