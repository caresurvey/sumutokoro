<?php

namespace Tool\User\tests\Browser\Pages;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class UserProfileTest extends DuskTestCase
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
            $browser->click('#LoginSubmit');
            $browser->pause(1000);
            $browser->assertSee('マイページ');

            // 入力
            $browser->visit('/user/profile');
            $browser->pause(1000);
            $browser->assertSee('プロフィール編集');
            $browser->type('#UserName', '一般登録ユーザー変更');
            $browser->type('#UserKana', 'いっぱんとうろくゆーざー変更');
            $browser->assertSee('事業所10');
            $browser->assertSee('事業所9');
            $browser->assertSee('事業所8');
            $browser->assertSee('事業所7');
            $browser->assertSee('事業所6');
            $browser->assertSee('事業所5');
            $browser->assertSee('事業所4');
            $browser->assertSee('事業所3');
            $browser->assertSee('事業所2');
            $browser->assertSee('事業所1');
            $browser->assertSee('法人3');
            $browser->type('#UserZip1', '079');
            $browser->type('#UserZip2', '0009');
            $browser->select('#UserPrefecture', '3');
            $browser->select('#UserCity', '3');
            $browser->type('#UserAddress', '中央区1条1丁目1-1変更');
            $browser->type('#UserTel1', '099');
            $browser->type('#UserTel2', '1239');
            $browser->type('#UserTel3', '4569');
            $browser->type('#UserFax', '0166-12-3456');
            $browser->type('#UserEmail', 'user99@hoge.co.jp');
            $browser->type('#UserCompany', '所属している事業所や法人変更');
            $browser->select('#UserJobType', '3');
            $browser->select('#UserUserType', '3');
            $browser->type('#UserMsg', 'コメント3変更');
            $browser->click('#UserSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);

            // 入力が反映されたか確認
            $browser->assertSee('一般登録ユーザー変更を変更しました');
            $browser->assertInputValue('#UserName', '一般登録ユーザー変更');
            $browser->assertInputValue('#UserKana', 'いっぱんとうろくゆーざー変更');
            $browser->assertInputValue('#UserZip1', '079');
            $browser->assertInputValue('#UserZip2', '0009');
            $browser->assertSelected('#UserPrefecture', '3');
            $browser->assertSelected('#UserCity', '3');
            $browser->assertInputValue('#UserAddress', '中央区1条1丁目1-1変更');
            $browser->assertInputValue('#UserTel1', '099');
            $browser->assertInputValue('#UserTel2', '1239');
            $browser->assertInputValue('#UserTel3', '4569');
            $browser->assertInputValue('#UserFax', '0166-12-3456');
            $browser->assertInputValue('#UserEmail', 'user99@hoge.co.jp');
            $browser->assertInputValue('#UserCompany', '所属している事業所や法人変更');
            $browser->assertSelected('#UserJobType', '3');
            $browser->assertSelected('#UserUserType', '3');
            $browser->assertInputValue('#UserMsg', 'コメント3変更');

            // メールアドレスだけ戻す
            $browser->type('#UserEmail', 'user@hoge.co.jp');
            $browser->click('#UserSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('一般登録ユーザー変更を変更しました');
        });
    }


}

