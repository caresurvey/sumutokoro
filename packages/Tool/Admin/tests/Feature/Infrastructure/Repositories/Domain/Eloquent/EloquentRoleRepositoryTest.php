<?php

namespace Tool\Admin\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\Admin\Domain\Models\Role\RoleRepository;
use Tool\Admin\tests\TestCase;
use Tool\Admin\Infrastructure\Eloquents\EloquentRole;
use Tool\Admin\tests\RefreshDatabaseLite;
use Tool\Admin\tests\TestData;

class EloquentRoleRepositoryTest extends TestCase
{
    private array $auth;
    private EloquentRole $eloquent;
    private roleRepository $roleRepo;
    private User $user;
    private TestData $dataData;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->roleRepo = app()->make(RoleRepository::class);
        $this->eloquent = app()->make(EloquentRole::class);

        // テストデータ作成
        $this->testData = new TestData('test');
    }

    /**
     * @test
     * list
     */
    public function list_正常系()
    {
        // テスト対象メソッドを実行
        $results = $this->roleRepo->list();

        // 検証
        $this->assertSame('システム管理者', $results[1]);
        $this->assertSame('サイト管理者', $results[2]);
        $this->assertSame('ゲスト', $results[5]);
    }
}
