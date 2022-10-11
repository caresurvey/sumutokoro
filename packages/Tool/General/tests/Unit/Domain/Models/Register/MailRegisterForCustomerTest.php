<?php

namespace Tool\General\tests\Unit\Domain\Models\Register;

use PHPUnit\Framework\TestCase;
use Tool\General\Domain\Models\Register\MailRegisterForCustomer;

class MailRegisterForCustomerTest extends TestCase
{
    /**
     * Test
     *
     * @return void
     */
    public function testNormalMode()
    {
        // データセット
        $data['name'] = 'お名前';
        $data['kana'] = 'ふりがな';
        $data['email'] = 'test@test.co.jp';
        $data['tel'] = '012-345-6789';
        $data['reply'] = 'ご返答方法';
        $data['msg'] = 'お問い合わせ内容';

        // テストするクラスを読み込み
        $result = new MailRegisterForCustomer($data);

        // 検証
        $this->assertInstanceOf(MailRegisterForCustomer::class, $result);
    }
}
