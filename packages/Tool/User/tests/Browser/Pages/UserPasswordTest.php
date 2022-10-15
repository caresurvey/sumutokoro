<?php

namespace Tool\User\tests\Browser\Pages;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class UserPasswordTest extends DuskTestCase
{
    /**
     * @test
     */
    public function パスワード変更テスト()
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
            $browser->visit('/user/password');
            $browser->pause(1000);
            $browser->assertSee('パスワード変更');
            $browser->type('#UserPassword', 'password');
            $browser->type('#UserPasswordConfirm', 'password');
            $browser->click('#UserSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('パスワード変更');

            // 入力
            $browser->visit('/user/password');
            $browser->pause(1000);
            $browser->assertSee('パスワード変更');
            $browser->type('#UserPassword', '');
            $browser->type('#UserPasswordConfirm', '');
            $browser->click('#UserSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('パスワードは必須です');
            $browser->assertSee('パスワード確認は必須です');

            $browser->type('#UserPassword', 'password');
            $browser->type('#UserPasswordConfirm', 'password1');
            $browser->click('#UserSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('パスワード確認が一致していません');

            $browser->type('#UserPassword', 'password');
            $browser->type('#UserPasswordConfirm', 'password');
            $browser->click('#UserSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('パスワードを変更しました');
            
        });
    }


}

