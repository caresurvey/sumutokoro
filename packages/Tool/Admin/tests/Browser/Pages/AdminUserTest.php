<?php

namespace Tool\Admin\tests\Browser\Pages;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminUserTest extends DuskTestCase
{
    /**
     * @test
     */
    public function 法人管理テスト()
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

            // 一覧
            $browser->visit('/admin/user');
            $browser->pause(1000);
            $browser->assertSee('100件がみつかりました');

            // 追加
            $browser->pause(1000);
            $browser->click('#UserAddBtn');
            $browser->type('#UserName', '追加ユーザー');
            $browser->type('#UserEmail', 'add@user.co.jp');
            $browser->type('#UserPassword', 'password');
            $browser->click('#UserAddSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('ユーザー情報編集');
            $browser->assertSee('追加ユーザーさんの編集ができます');
            $browser->assertSee('ユーザー認証ができるのは登録ユーザーのみです');

            // 入力
            $browser->check('#UserEnabled');
            $browser->type('#UserName', '追加ユーザー変更');
            $browser->type('#UserKana', '追加いっぱんえつらんゆーざー変更');
            $browser->type('#UserZip1', '079');
            $browser->type('#UserZip2', '0009');
            $browser->scrollIntoView('#UserPrefecture')->select('#UserPrefecture', '3');
            $browser->scrollIntoView('#UserCity')->select('#UserCity', '3');
            $browser->scrollIntoView('#UserAddress')->type('#UserAddress', '追加住所変更');
            $browser->scrollIntoView('#UserTel1')->type('#UserTel1', '099');
            $browser->scrollIntoView('#UserTel2')->type('#UserTel2', '1239');
            $browser->scrollIntoView('#UserTel3')->type('#UserTel3', '4569');
            $browser->scrollIntoView('#UserFax')->type('#UserFax', '0166-123-4569');
            $browser->scrollIntoView('#UserEmail')->type('#UserEmail', 'visitor_add_edit@hoge.co.jp');
            $browser->scrollIntoView('#UserCompany')->type('#UserCompany', '所属している事業所や法人変更');
            $browser->scrollIntoView('#UserRole')->select('#UserRole', '3');
            $browser->scrollIntoView('#UserJobType')->select('#UserJobType', '3');
            $browser->scrollIntoView('#UserUserType')->select('#UserUserType', '3');
            $browser->scrollIntoView('#UserMsg')->type('#UserMsg', '備考変更');
            $browser->scrollIntoView('#UserSubmit')->click('#UserSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('追加ユーザー変更を変更しました');
            
            // 入力が反映されたか確認し、変更
            $browser->assertChecked('#UserEnabled');
            $browser->assertInputValue('#UserName', '追加ユーザー変更');
            $browser->assertInputValue('#UserKana', '追加いっぱんえつらんゆーざー変更');
            $browser->assertInputValue('#UserZip1', '079');
            $browser->assertInputValue('#UserZip2', '0009');
            $browser->assertSelected('#UserPrefecture', '3');
            $browser->assertSelected('#UserCity', '3');
            $browser->assertInputValue('#UserAddress', '追加住所変更');
            $browser->assertInputValue('#UserTel1', '099');
            $browser->assertInputValue('#UserTel2', '1239');
            $browser->assertInputValue('#UserTel3', '4569');
            $browser->scrollIntoView('#UserFax')->assertInputValue('#UserFax', '0166-123-4569');
            $browser->scrollIntoView('#UserEmail')->assertInputValue('#UserEmail', 'visitor_add_edit@hoge.co.jp');
            $browser->scrollIntoView('#UserCompany')->assertInputValue('#UserCompany', '所属している事業所や法人変更');
            $browser->scrollIntoView('#UserIsAuthenticated')->check('#UserIsAuthenticated');
            $browser->scrollIntoView('#UserAuthenticatedMsg')->type('#UserAuthenticatedMsg', '承認済みメッセージ');
            $browser->assertSee('関連付けられた事業所はありません');
            $browser->assertSee('関連付けられた法人はありません');
            $browser->scrollIntoView('#UserRole')->assertSelected('#UserRole', '3');
            $browser->scrollIntoView('#UserJobType')->assertSelected('#UserJobType', '3');
            $browser->scrollIntoView('#UserUserType')->assertSelected('#UserUserType', '3');
            $browser->scrollIntoView('#UserMsg')->assertInputValue('#UserMsg', '備考変更');
            $browser->click('#UserSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('追加ユーザー変更を変更しました');
        });
    }


}

