<?php

namespace Tool\User\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Hash;
use Tool\User\Domain\Models\Common\LogicResponse;
use Tool\User\Domain\Models\Password\PasswordRepository;
use Tool\User\Infrastructure\Eloquents\EloquentLog;
use Tool\User\Infrastructure\Eloquents\EloquentUser;
use Tool\User\tests\TestCase;
use Tool\User\Infrastructure\Eloquents\EloquentPassword;
use Tool\User\tests\RefreshDatabaseLite;
use Tool\User\tests\TestData;

class EloquentPasswordRepositoryTest extends TestCase
{
    private array $auth;
    private EloquentLog $eloquentLog;
    private EloquentPassword $eloquentPassword;
    private EloquentUser $eloquentUser;
    private passwordRepository $passwordRepo;
    private User $user;
    private TestData $dataData;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->passwordRepo = app()->make(PasswordRepository::class);
        $this->eloquentPassword = app()->make(EloquentPassword::class);
        $this->eloquentUser = app()->make(EloquentUser::class);
        $this->eloquentLog = app()->make(EloquentLog::class);

        // テストデータ作成
        $this->testData = new TestData('test');

        // ユーザー情報
        $this->auth['id'] = 3;
        $this->auth['name'] = '登録太郎';
        $this->auth['role_id'] = 3;
        $this->auth['role_name'] = '登録ユーザー';
    }

    /**
     * @test
     */
    public function update_正常系()
    {
        // 認証されたユーザーにする
        $this->auth['is_authenticated'] = 1;

        // POST
        $post['user']['id'] = 3;
        $post['user']['password'] = 'password';
        $post['user']['password_confirm'] = 'password';

        // 実行前のレコード数
        $beforeCount = $this->eloquentUser->count();
        $beforeCountLog = $this->eloquentLog->count();

        // テスト対象メソッドを実行
        $result = $this->passwordRepo->update($post, $this->auth);

        // 変更されたデータを検証用に取得
        $check = $this->eloquentUser->where('id', 3)->first();

        // 実行後のレコード数
        $afterCount = $this->eloquentUser->count();
        $afterCountLog = $this->eloquentLog->count();

        // 検証
        $this->assertInstanceOf(LogicResponse::class, $result);
        $this->assertTrue(Hash::check($post['user']['password'], $check->password));
        $this->assertTrue($result->getResult());

        // 処理後のレコード数をチェック
        $this->assertSame($beforeCount, $afterCount); // レコード数が変わってないかチェック
        $this->assertSame($beforeCountLog + 1, $afterCountLog);
    }
}
