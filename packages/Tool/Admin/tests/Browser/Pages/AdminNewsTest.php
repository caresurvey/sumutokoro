<?php

namespace Tool\Admin\tests\Browser\Pages;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminNewsTest extends DuskTestCase
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
            $browser->type('#LoginEmail', 'root@hoge.co.jp');
            $browser->type('#LoginPassword', 'password');
            $browser->click('#LoginSubmit');
            $browser->pause(1000);
            $browser->assertSee('管理画面');

            // 一覧
            $browser->visit('/admin/news');
            $browser->pause(1000);
            $browser->assertSee('100件がみつかりました');

            // 追加
            $browser->pause(1000);
            $browser->click('#NewsAddBtn');
            $browser->type('#NewsName', '追加お知らせ');
            $browser->click('#NewsAddSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('お知らせ編集');
            $browser->assertSee('追加お知らせの編集ができます');

            // 入力
            $browser->check('#NewsDisplay');
            $browser->check('#NewsPreview');
            $browser->type('#NewsName', '追加お知らせ変更');
            $browser->type('#NewsBody', '追加本文変更');
            $browser->type('#NewsUrl', 'https://hogehoge100.co.jp/edit');
            $browser->click('#NewsSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('追加お知らせ変更を変更しました');

            // 入力が反映されたか確認
            $browser->assertChecked('#NewsDisplay', '1');
            $browser->assertChecked('#NewsPreview');
            $browser->assertInputValue('#NewsName', '追加お知らせ変更');
            $browser->assertInputValue('#NewsBody', '追加本文変更');
            $browser->assertInputValue('#NewsUrl', 'https://hogehoge100.co.jp/edit');

            // 削除とその後の動作確認
            $browser->type('#NewsDelete', 'news_101');
            $browser->click('#DeleteSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('を削除しました');
            $browser->assertSee('100件がみつかりました');
            $browser->click('#NewsName100');
            $browser->assertSee('タイトル100の編集ができます');
            $browser->click('#NewsSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('タイトル100を変更しました');
        });
    }


}

