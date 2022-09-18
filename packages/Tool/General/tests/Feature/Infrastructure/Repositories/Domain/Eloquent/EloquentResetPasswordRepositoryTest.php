<?php

namespace Tool\General\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Hash;
use Tool\General\Domain\Models\ResetPassword\ResetPasswordRepository;
use Tool\General\Infrastructure\Eloquents\EloquentResetPassword;
use Tool\General\Infrastructure\Eloquents\EloquentUser;
use Tool\General\tests\TestCase;
use Tool\General\tests\RefreshDatabaseLite;

class EloquentResetPasswordRepositoryTest extends TestCase
{
    private EloquentResetPassword $eloquentResetPassword;
    private EloquentUser $eloquentUser;
    private ResetPasswordRepository $resetPasswordRepo;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->resetPasswordRepo = app()->make(ResetPasswordRepository::class);
        $this->eloquentResetPassword = app()->make(EloquentResetPassword::class);
        $this->eloquentUser = app()->make(EloquentUser::class);
    }

    /**
     * @test
     */
    public function store_正常系()
    {
        // 実行前のレコード数
        $beforeCount = $this->eloquentResetPassword->count();

        // テスト対象メソッドを実行
        $result = $this->resetPasswordRepo->store('user@hoge.co.jp', 'token');

        // 実行後のレコード数
        $afterCount = $this->eloquentResetPassword->count();

        // 検証
        $this->assertTrue($result->getResult());

        // 処理後のレコード数をチェック
        $this->assertSame($beforeCount + 1, $afterCount); // レコード数が変わってないかチェック
    }

    /**
     * @test
     */
    public function getUser_正常系()
    {
        // テストデータセット
        $email = 'user@hoge.co.jp';
        $token = $this->resetPasswordRepo->makeToken($email);
        $this->eloquentResetPassword->email = $email;
        $this->eloquentResetPassword->token = $token;
        $this->eloquentResetPassword->save();

        // テスト対象メソッドを実行
        $result = $this->resetPasswordRepo->getUser($token);

        // 検証
        $this->assertIsInt($result['id']);
    }

    /**
     * @test
     */
    public function makeToken_正常系()
    {
        // テストデータ
        $email = 'user@hoge.ne.jp';

        // テスト対象メソッドを実行
        $result = $this->resetPasswordRepo->makeToken($email);

        // 比較用トークン
        $token = $email . date("Ymd");

        // 検証
        $this->assertTrue(Hash::check($token, $result));
    }
}
