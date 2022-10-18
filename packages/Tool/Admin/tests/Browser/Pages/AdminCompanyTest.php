<?php

namespace Tool\Admin\tests\Browser\Pages;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class AdminCompanyTest extends DuskTestCase
{
    /**
     * @test
     */
    public function 法人管理テスト()
    {
        $this->browse(function (Browser $browser) {

            // ログイン
            $browser->visit('/admin/login');
            $browser->pause(1000);
            $browser->scrollIntoView('#LoginEmail')->type('#LoginEmail', 'root@hoge.co.jp');
            $browser->scrollIntoView('#LoginPassword')->type('#LoginPassword', 'password');
            $browser->click('#LoginSubmit');
            $browser->pause(1000);
            $browser->assertSee('管理画面');

            // 一覧
            $browser->visit('/admin/company');
            $browser->pause(1000);
            $browser->assertSee('100件がみつかりました');

            // 追加
            $browser->pause(1000);
            $browser->click('#CompanyAddBtn');
            $browser->scrollIntoView('#CompanyName')->type('#CompanyName', '追加法人');
            $browser->click('#CompanyAddSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('法人情報編集');
            $browser->assertSee('追加法人の編集ができます');
            $browser->assertSee('地図未設定');

            // 入力
            $browser->check('#CompanyDisplay');
            $browser->check('#CompanyPreview');
            $browser->scrollIntoView('#CompanyName')->type('#CompanyName', '追加法人変更');
            $browser->scrollIntoView('#CompanyLongName')->type('#CompanyLongName', '追加法人フルネーム変更');
            $browser->scrollIntoView('#CompanyKana')->type('#CompanyKana', '追加ふりがな変更');
            $browser->scrollIntoView('#CompanyTel1')->type('#CompanyTel1', '099');
            $browser->scrollIntoView('#CompanyTel2')->type('#CompanyTel2', '1239');
            $browser->scrollIntoView('#CompanyTel3')->type('#CompanyTel3', '4569');
            $browser->scrollIntoView('#CompanyFax')->type('#CompanyFax', '0166-123-4569');
            $browser->scrollIntoView('#CompanyEmail')->type('#CompanyEmail', 'edit@hoge.co.jp');
            $browser->scrollIntoView('#CompanyZip1')->type('#CompanyZip1', '099');
            $browser->scrollIntoView('#CompanyZip2')->type('#CompanyZip2', '1239');
            $browser->scrollIntoView('#CompanyPrefecture')->select('#CompanyPrefecture', '3');
            $browser->scrollIntoView('#CompanyCity')->select('#CompanyCity', '3');
            $browser->scrollIntoView('#CompanyAddress')->type('#CompanyAddress', '追加住所3変更');
            $browser->scrollIntoView('#CompanyLat')->type('#CompanyLat', '44.96281006321748');
            $browser->scrollIntoView('#CompanyLng')->type('#CompanyLng', '143.95817790725756');
            $browser->scrollIntoView('#CompanyStart')->type('#CompanyStart', '追加法人開始変更');
            $browser->scrollIntoView('#CompanyPresident')->type('#CompanyPresident', '追加代表変更');
            $browser->scrollIntoView('#CompanyHistory')->type('#CompanyHistory', '追加社歴変更');
            $browser->scrollIntoView('#CompanyStaff')->type('#CompanyStaff', '追加従業員数変更');
            $browser->scrollIntoView('#CompanyMsg')->type('#CompanyMsg', '追加備考変更');
            $browser->click('#CompanySubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('追加法人変更を変更しました');

            // 入力が反映されたか確認
            $browser->assertSee('法人編集');
            $browser->assertChecked('#CompanyDisplay');
            $browser->assertChecked('#CompanyPreview');
            $browser->scrollIntoView('#CompanyName')->assertInputValue('#CompanyName', '追加法人変更');
            $browser->scrollIntoView('#CompanyLongName')->assertInputValue('#CompanyLongName', '追加法人フルネーム変更');
            $browser->scrollIntoView('#CompanyKana')->assertInputValue('#CompanyKana', '追加ふりがな変更');
            $browser->scrollIntoView('#CompanyTel1')->assertInputValue('#CompanyTel1', '099');
            $browser->scrollIntoView('#CompanyTel2')->assertInputValue('#CompanyTel2', '1239');
            $browser->scrollIntoView('#CompanyTel3')->assertInputValue('#CompanyTel3', '4569');
            $browser->scrollIntoView('#CompanyFax')->assertInputValue('#CompanyFax', '0166-123-4569');
            $browser->scrollIntoView('#CompanyEmail')->assertInputValue('#CompanyEmail', 'edit@hoge.co.jp');
            $browser->scrollIntoView('#CompanyZip1')->assertInputValue('#CompanyZip1', '099');
            $browser->scrollIntoView('#CompanyZip2')->assertInputValue('#CompanyZip2', '1239');
            $browser->scrollIntoView('#CompanyPrefecture')->assertSelected('#CompanyPrefecture', '3');
            $browser->scrollIntoView('#CompanyCity')->assertSelected('#CompanyCity', '3');
            $browser->scrollIntoView('#CompanyAddress')->assertInputValue('#CompanyAddress', '追加住所3変更');
            $browser->scrollIntoView('#CompanyLat')->assertInputValue('#CompanyLat', '44.96281006321748');
            $browser->scrollIntoView('#CompanyLng')->assertInputValue('#CompanyLng', '143.95817790725756');
            $browser->scrollIntoView('#CompanyStart')->assertInputValue('#CompanyStart', '追加法人開始変更');
            $browser->scrollIntoView('#CompanyPresident')->assertInputValue('#CompanyPresident', '追加代表変更');
            $browser->scrollIntoView('#CompanyHistory')->assertInputValue('#CompanyHistory', '追加社歴変更');
            $browser->scrollIntoView('#CompanyStaff')->assertInputValue('#CompanyStaff', '追加従業員数変更');
            $browser->scrollIntoView('#CompanyMsg')->assertInputValue('#CompanyMsg', '追加備考変更');
            
            // 削除とその後の動作確認
            $browser->scrollIntoView('#CompanyDelete')->type('#CompanyDelete', 'company_101');
            $browser->scrollIntoView('#DeleteSubmit')->click('#DeleteSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('を削除しました');
            $browser->assertSee('100件がみつかりました');
            $browser->click('#CompanyName100');
            $browser->assertSee('法人100の編集ができます');
            $browser->scrollIntoView('#CompanySubmit')->click('#CompanySubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('法人100を変更しました');            
        });
    }


}

