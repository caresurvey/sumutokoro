<?php

namespace Tool\User\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\User\Domain\Models\User\UserRepository;
use Tool\User\tests\TestCase;
use Tool\User\Domain\Models\Common\LogicResponse;
use Tool\User\Infrastructure\Eloquents\EloquentUser;
use Tool\User\Infrastructure\Eloquents\EloquentLog;
use Tool\User\tests\RefreshDatabaseLite;
use Tool\User\tests\TestData;

class EloquentUserRepositoryTest extends TestCase
{
    private array $auth;
    private EloquentUser $eloquent;
    private userRepository $userRepo;
    private User $user;
    private TestData $dataData;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->userRepo = app()->make(UserRepository::class);
        $this->eloquent = app()->make(EloquentUser::class);
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
    public function edit_正常系()
    {
        // 認証されたユーザーにする
        $this->auth['is_authenticated'] = 1;

        // テスト対象メソッドを実行
        $result = $this->userRepo->edit($this->auth);

        // 検証
        $this->assertSame(3, $result['id']);
    }

    /**
     * @test
     */
    public function update_正常系()
    {
        // 認証されたユーザーにする
        $this->auth['is_authenticated'] = 1;

        // 実行前のレコード数
        $beforeCount = $this->eloquent->count();
        $beforeCountLog = $this->eloquentLog->count();

        // テスト対象メソッドを実行
        $result = $this->userRepo->update($this->testData->requestUserUpdate(), $this->auth);

        // 変更されたデータを検証用に取得
        $check = $this->eloquent->where('id', $this->testData->requestUserUpdate()['user']['id'])->first();

        // 実行後のレコード数
        $afterCount = $this->eloquent->count();
        $afterCountLog = $this->eloquentLog->count();

        // 検証
        $this->assertInstanceOf(LogicResponse::class, $result);
        $this->assertTrue($result->getResult());
        $this->assertSame(3, $check->id);
        $this->assertSame(1, $check->enabled);
        $this->assertSame('変更ユーザー', $check->name);

        // 処理後のレコード数をチェック
        $this->assertSame($beforeCount, $afterCount); // レコード数が変わってないかチェック
        $this->assertSame($beforeCountLog + 1, $afterCountLog);
    }
}
