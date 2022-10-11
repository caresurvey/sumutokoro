<?php

namespace Tool\General\tests\Unit\Domain\Models\Register;

use Tests\TestCase;
use Tool\General\Domain\Models\Register\MailRegisterForAdmin;
use Tool\General\Domain\Models\Register\MailRegisterForCustomer;
use Tool\General\Domain\Models\Register\SendRegister;

class SendRegisterTest extends TestCase
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
        $mailRegisterForAdmin = new MailRegisterForAdmin($data);

        // テストするクラスを読み込み
        $sendRegister = new SendRegister();

        // 検証
        $this->assertTrue($sendRegister->sendMailForAdmin($mailRegisterForAdmin));
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
        $mailRegisterForCustomer = new MailRegisterForCustomer($data);

        // テストするクラスを読み込み
        $sendRegister = new SendRegister();

        // 検証
        $this->assertTrue($sendRegister->sendMailForCustomer($mailRegisterForCustomer));
    }
}
