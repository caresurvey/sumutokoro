<?php

namespace Tool\Admin\tests\Browser\Pages;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminFaxTest extends DuskTestCase
{
    /**
     * @test
     */
    public function その他管理画面テスト()
    {
        $this->browse(function ($browser) {

            // ログイン
            $browser->visit('/admin/login');
            $browser->pause(1000);
            $browser->type('#LoginEmail', 'root@hoge.co.jp');
            $browser->type('#LoginPassword', 'password');
            $browser->click('#LoginSubmit');
            $browser->pause(1000);
            $browser->assertSee('管理画面');

            // FAX送付状
            $browser->visit('/admin/fax');
            $browser->pause(1000);
            $browser->assertSee('FAX送付状作成');
            $browser->type('#FaxDate', '日付');
            $browser->type('#FaxCompany', '宛先会社名');
            $browser->type('#FaxStaff', 'ご担当者様');
            $browser->type('#FaxTelNumber', '電話番号');
            $browser->type('#FaxFaxNumber', 'FAX番号');
            $browser->type('#FaxNum', '送付枚数');
            $browser->type('#FaxSender', '送信者');
            $browser->type('#FaxBody', 'FAX中段あたりの本文');
            $browser->type('#FaxSpot', '紹介事業所');
            $browser->click('#FaxSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('識別No');
            $browser->assertSee('FAX送付状');

            // データダウンロード
            $browser->visit('/admin/download');
            $browser->pause(1000);
            $browser->assertSee('データダウンロード');

            // お問い合わせ履歴
            $browser->visit('/contact');
            $browser->pause(1000);
            $browser->type('#ContactName', '履歴名前');
            $browser->type('#ContactKana', '履歴カナ');
            $browser->type('#ContactEmail', 'test@test.co.jp');
            $browser->type('#ContactTel', '0166-12-3456');
            $browser->click('#ContactReply1');
            $browser->type('#ContactMsg', '履歴お問い合わせ内容');
            $browser->click('#ContactPrivacy');
            $browser->click('#ContactSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('お問い合わせ完了');
            $browser->visit('/admin/contact');
            $browser->pause(1000);
            $browser->assertSee('履歴名前さん');
            $browser->assertSee('メールでのご返答');

            // 操作履歴
            $browser->visit('/admin/log');
            $browser->pause(1000);
            $browser->assertSee('操作履歴');
            $browser->assertSee('システム管理者さん');
            $browser->assertSee('login');
        });
    }


}

