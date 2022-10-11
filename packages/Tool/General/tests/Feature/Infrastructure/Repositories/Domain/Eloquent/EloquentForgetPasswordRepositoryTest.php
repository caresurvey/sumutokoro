<?php

namespace Tool\General\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Hash;
use Tool\General\Domain\Models\ForgetPassword\ForgetPasswordRepository;
use Tool\General\Infrastructure\Eloquents\EloquentUser;
use Tool\General\tests\TestCase;
use Tool\General\tests\RefreshDatabaseLite;

class EloquentForgetPasswordRepositoryTest extends TestCase
{
    private EloquentUser $eloquentUser;
    private ForgetPasswordRepository $forgetPasswordRepo;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->forgetPasswordRepo = app()->make(ForgetPasswordRepository::class);
        $this->eloquentUser = app()->make(EloquentUser::class);
    }

    /**
     * @test
     */
    public function makeToken_正常系()
    {
        // テストデータ
        $email = 'visitor4@hoge.co.jp';

        // テスト対象メソッドを実行
        $result = $this->forgetPasswordRepo->makeToken($email);

        // 比較用トークン
        $token = $email . date("Ymd");

        // 検証
        $this->assertTrue(Hash::check($token, $result));
    }

    /**
     * @test
     */
    public function store_正常系()
    {
        // 実行前のレコード数
        $beforeCount = $this->eloquentUser->count();

        // テスト対象メソッドを実行
        $result = $this->forgetPasswordRepo->store('visitor4@hoge.co.jp', 'token');

        // 実行後のレコード数
        $afterCount = $this->eloquentUser->count();

        // 検証
        $this->assertTrue($result->getResult());

        // 処理後のレコード数をチェック
        $this->assertSame($beforeCount, $afterCount); // レコード数が変わってないかチェック
    }
}
