<?php

namespace Tool\User\tests\Browser\Pages;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserCompanyTest extends DuskTestCase
{
    /**
     * @test
     */
    public function 法人管理テスト()
    {
        $this->browse(function (Browser $browser) {

            // ログイン
            $browser->visit('/user/login');
            $browser->pause(1000);
            $browser->type('#LoginEmail', 'user@hoge.co.jp');
            $browser->type('#LoginPassword', 'password');
            $browser->scrollIntoView('#LoginSubmit')->click('#LoginSubmit');
            $browser->pause(1000);
            $browser->assertSee('マイページ');

            // 入力
            $browser->visit('/user/company');
            $browser->assertSee('1件がみつかりました');
            $browser->click('#CompanyName3');
            $browser->pause(1000);
            $browser->assertSee('法人編集');
            $browser->check('#CompanyDisplay');
            $browser->check('#CompanyPreview');
            $browser->type('#CompanyName', '法人3変更');
            $browser->type('#CompanyLongName', '法人フルネーム変更');
            $browser->type('#CompanyKana', 'ふりがな3変更');
            $browser->type('#CompanyTel1', '099');
            $browser->type('#CompanyTel2', '1239');
            $browser->type('#CompanyTel3', '4569');
            $browser->type('#CompanyFax', '0166-123-4569');
            $browser->type('#CompanyEmail', 'edit@hoge.co.jp');
            $browser->type('#CompanyZip1', '079');
            $browser->type('#CompanyZip2', '0009');
            $browser->select('#CompanyPrefecture', '3');
            $browser->select('#CompanyCity', '3');
            $browser->type('#CompanyAddress', '住所3変更');
            $browser->type('#CompanyLat', '44.96281006321748');
            $browser->type('#CompanyLng', '143.95817790725756');
            $browser->type('#CompanyStart', '法人開始3変更');
            $browser->type('#CompanyPresident', '代表3変更');
            $browser->type('#CompanyHistory', '社歴3歳変更');
            $browser->type('#CompanyStaff', '従業員数3変更');
            $browser->type('#CompanyMsg', 'コメント3変更');
            $browser->click('#CompanySubmit');
            $browser->acceptDialog();
            $browser->pause(1000);

            // 入力が反映されたか確認
            $browser->assertSee('法人3変更を変更しました');
            $browser->assertSee('法人編集');
            $browser->assertChecked('#CompanyDisplay');
            $browser->assertChecked('#CompanyPreview');
            $browser->assertInputValue('#CompanyName', '法人3変更');
            $browser->assertInputValue('#CompanyLongName', '法人フルネーム変更');
            $browser->assertInputValue('#CompanyKana', 'ふりがな3変更');
            $browser->assertInputValue('#CompanyTel1', '099');
            $browser->assertInputValue('#CompanyTel2', '1239');
            $browser->assertInputValue('#CompanyTel3', '4569');
            $browser->assertInputValue('#CompanyFax', '0166-123-4569');
            $browser->assertInputValue('#CompanyEmail', 'edit@hoge.co.jp');
            $browser->assertInputValue('#CompanyZip1', '079');
            $browser->assertInputValue('#CompanyZip2', '0009');
            $browser->assertSelected('#CompanyPrefecture', '3');
            $browser->assertSelected('#CompanyCity', '3');
            $browser->assertInputValue('#CompanyAddress', '住所3変更');
            $browser->assertInputValue('#CompanyLat', '44.96281006321748');
            $browser->assertInputValue('#CompanyLng', '143.95817790725756');
            $browser->assertInputValue('#CompanyStart', '法人開始3変更');
            $browser->assertInputValue('#CompanyPresident', '代表3変更');
            $browser->assertInputValue('#CompanyHistory', '社歴3歳変更');
            $browser->assertInputValue('#CompanyStaff', '従業員数3変更');
            $browser->assertInputValue('#CompanyMsg', 'コメント3変更');
        });
    }


}

