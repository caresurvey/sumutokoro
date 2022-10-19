<?php

namespace Tool\General\tests\Browser\Pages;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tool\General\Infrastructure\Eloquents\EloquentResetPassword;

class GeneralTest extends DuskTestCase
{
    /**
     * @test
     */
    public function リンク切れテスト()
    {
        $this->browse(function ($browser) {

            // トップページアクセス
            $browser->visit('/');
            $browser->pause(1000);

            // サイトマップアクセス
            $browser->visit('/sitemap');
            $browser->pause(1000);
            $browser->assertSee('サイトマップ');

            // プライバシーポリシーアクセス
            $browser->visit('/privacy');
            $browser->pause(1000);
            $browser->assertSee('プライバシーポリシー');

            // 運営会社アクセス
            $browser->visit('/company');
            $browser->pause(1000);
            $browser->assertSee('運営会社');

            // よくある質問アクセス
            $browser->visit('/company');
            $browser->pause(1000);
            $browser->assertSee('運営会社');

            // サービス案内アクセス
            $browser->visit('/service');
            $browser->pause(1000);
            $browser->assertSee('サービス案内');

            // お知らせアクセス
            $browser->visit('/news');
            $browser->pause(1000);
            $browser->assertSee('お知らせ一覧');
            $browser->click('.btn-more');
            $browser->pause(1000);
            $browser->assertSee('お知らせの詳細');

            // 事業所検索
            $browser->visit('/search');
            $browser->pause(1000);
            $browser->assertSee('事業所の検索');
            $browser->scrollIntoView('#CategoryId2')->click('#CategoryId2');
            $browser->scrollIntoView('#PriceRangeId2')->radio('#PriceRangeId2', "2");
            $browser->scrollIntoView('#SearchSubmitBtn')->click('#SearchSubmitBtn');
            $browser->pause(1000);
            $browser->assertSee('10件が見つかりました');

            // ヘッダー検索（市町村）
            $browser->scrollIntoView('#HeaderSearchCity')->select('#HeaderSearchCity', '2');
            $browser->scrollIntoView('#HeaderSearchKeyword')->type('#HeaderSearchKeyword', '');
            $browser->scrollIntoView('#HeaderSearchSubmit')->click('#HeaderSearchSubmit');
            $browser->pause(1000);
            $browser->assertSee('10件が見つかりました');

            // ヘッダー検索（キーワード）
            $browser->pause(1000);
            $browser->select('#HeaderSearchCity', '1');
            $browser->scrollIntoView('#HeaderSearchKeyword')->type('#HeaderSearchKeyword', '事業所');
            $browser->scrollIntoView('#HeaderSearchSubmit')->click('#HeaderSearchSubmit');
            $browser->pause(1000);
            $browser->assertSee('20件が見つかりました');
        });
    }

    /**
     * @test
     */
    public function 一般的なお問い合わせテスト()
    {
        $this->browse(function (Browser $browser) {

            // アクセス
            $browser->visit('/contact');
            $browser->pause(1000);

            // 送信をクリック
            $browser->click('#ContactSubmit');
            $browser->acceptDialog();

            // エラーメッセージを確認
            $browser->assertSee('お名前は必須です');
            $browser->assertSee('メールアドレスは必須です');
            $browser->assertSee('ご返答方法は必須です');
            $browser->assertSee('お問い合わせ内容は必須です');
            $browser->assertSee('プライバシーポリシーの同意は必須です');

            // 入力
            $browser->scrollIntoView('#ContactName')->type('#ContactName', '名前');
            $browser->scrollIntoView('#ContactKana')->type('#ContactKana', 'カナ');
            $browser->scrollIntoView('#ContactEmail')->type('#ContactEmail', 'test@test.co.jp');
            $browser->scrollIntoView('#ContactTel')->type('#ContactTel', '0166-12-3456');
            $browser->scrollIntoView('#ContactReply1')->click('#ContactReply1');
            $browser->scrollIntoView('#ContactMsg')->type('#ContactMsg', 'お問い合わせ内容');
            $browser->scrollIntoView('#ContactPrivacy')->click('#ContactPrivacy');
            $browser->scrollIntoView('#ContactSubmit')->click('#ContactSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);

            // 確認
            $browser->assertSee('お問い合わせ完了');
        });
    }

    /**
     * @test
     */
    public function ユーザー登録テスト()
    {
        $this->browse(function (Browser $browser) {

            // アクセス
            $browser->visit('/register');
            $browser->pause(1000);

            // 送信をクリック
            $browser->click('#UserSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);

            // エラーメッセージを確認
            $browser->assertSee('お名前は必須です');
            $browser->assertSee('メールアドレスは必須です');
            $browser->assertSee('パスワードは必須です');
            $browser->assertSee('パスワード確認は必須です');
            $browser->assertSee('ユーザータイプは必須です');
            $browser->assertSee('職種は必須です');
            $browser->assertSee('プライバシーポリシーの同意は必須です');

            // 入力
            $browser->scrollIntoView('#UserName')->type('#UserName', '名前');
            $browser->scrollIntoView('#UserKana')->type('#UserKana', 'カナ');
            $browser->scrollIntoView('#UserTel1')->type('#UserTel1', '0166');
            $browser->scrollIntoView('#UserTel2')->type('#UserTel2', '12');
            $browser->scrollIntoView('#UserTel3')->type('#UserTel3', '3456');
            $browser->scrollIntoView('#UserEmail')->type('#UserEmail', 'test@test.co.jp');
            $browser->scrollIntoView('#UserPassword')->type('#UserPassword', 'password');
            $browser->scrollIntoView('#UserPasswordConfirm')->type('#UserPasswordConfirm', 'password');
            $browser->scrollIntoView('#UserRoleId4')->click('#UserRoleId4');
            $browser->scrollIntoView('#UserJobId5')->click('#UserJobId5');
            $browser->scrollIntoView('#UserCompany')->type('#UserCompany', '所属事務所');
            $browser->scrollIntoView('#UserMsg')->type('#UserMsg', '備考');
            $browser->scrollIntoView('#UserPrivacy')->click('#UserPrivacy');
            $browser->scrollIntoView('#UserSubmit')->click('#UserSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);

            // 確認
            $browser->assertSee('ユーザー登録完了');
        });
    }

    /**
     * @test
     */
    public function パスワードリセット申請テスト()
    {
        $this->browse(function (Browser $browser) {

            // アクセス
            $browser->visit('/password/email');
            $browser->pause(1000);

            // 入力して送信をクリック
            $browser->type('#ForgetPasswordEmail', '');
            $browser->scrollIntoView('#ForgetPasswordSubmit')->click('#ForgetPasswordSubmit');

            // エラーメッセージを確認
            $browser->assertSee('メールアドレスは必ず入力して下さい');

            // 送信をクリック
            $browser->type('#ForgetPasswordEmail', 'noting@hoge.co.jp');
            $browser->scrollIntoView('#ForgetPasswordSubmit')->click('#ForgetPasswordSubmit');

            // エラーメッセージを確認
            $browser->assertSee('メールアドレスは存在しません');

            // 入力
            $browser->type('#ForgetPasswordEmail', 'user@hoge.co.jp');
            $browser->scrollIntoView('#ForgetPasswordSubmit')->click('#ForgetPasswordSubmit');
            $browser->pause(1000);

            // 確認
            $browser->assertSee('パスワードリセット申請完了');
        });
    }

    /**
     * @test
     */
    public function パスワードリセットテスト()
    {
        $this->browse(function (Browser $browser) {

            // アクセス
            $eloquent = new EloquentResetPassword();
            $data = $eloquent->where('email', 'user@hoge.co.jp')->pluck('token');
            $browser->visit('/password/reset/' . base64_encode($data[0]));
            $browser->pause(1000);

            // 入力して送信をクリック
            $browser->type('#ResetPassword', '');
            $browser->type('#ResetPasswordConfirm', '');
            $browser->scrollIntoView('#ResetPasswordSubmit')->click('#ResetPasswordSubmit');

            // エラーメッセージを確認
            $browser->assertSee('パスワードは必ず入力して下さい');
            $browser->assertSee('パスワード確認は必ず入力して下さい');

            // 送信をクリック
            $browser->type('#ResetPassword', 'password');
            $browser->type('#ResetPasswordConfirm', 'password1');
            $browser->scrollIntoView('#ResetPasswordSubmit')->click('#ResetPasswordSubmit');

            // エラーメッセージを確認
            $browser->assertSee('パスワード確認が一致していません');

            // 入力
            $browser->type('#ResetPassword', 'password');
            $browser->type('#ResetPasswordConfirm', 'password');
            $browser->scrollIntoView('#ResetPasswordSubmit')->click('#ResetPasswordSubmit');
            $browser->pause(1000);

            // 確認
            $browser->assertSee('パスワードリセット申請完了');
        });
    }
}

