<?php

namespace Tool\Admin\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Mockery;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\Admin\Domain\Models\AreaCenter\AreaCenterRepository;
use Tool\Admin\Domain\Models\AreaCenter\Export;
use Tool\Admin\tests\TestCase;
use Tool\Admin\Infrastructure\Eloquents\EloquentAreaCenter;
use Tool\Admin\Infrastructure\Eloquents\EloquentLog;
use Tool\Admin\tests\RefreshDatabaseLite;
use Tool\Admin\tests\TestData;

class EloquentAreaCenterRepositoryTest extends TestCase
{
    private array $auth;
    private EloquentAreaCenter $eloquent;
    private EloquentLog $log;
    private areaCenterRepository $areaCenterRepo;
    private User $user;
    private TestData $dataData;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->areaCenterRepo = app()->make(AreaCenterRepository::class);
        $this->eloquent = app()->make(EloquentAreaCenter::class);
        $this->eloquentLog = app()->make(EloquentLog::class);

        // テストデータ作成
        $this->testData = new TestData('test');

        // ユーザー情報
        $this->auth['id'] = 1;
        $this->auth['name'] = 'システム管理者';
        $this->auth['role_id'] = 1;
        $this->auth['role_name'] = '権限';
    }

    /**
     * @test
     * list
     */
    public function getBookData_正常系()
    {
        // テスト対象メソッドを実行
        $results = $this->areaCenterRepo->getBookData(2);

        // 検証
        $this->assertIsInt($results[0]['id']);
    }

    /**
     * @test
     * store
     */
    public function export_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->areaCenterRepo->export();

        // 検証
        $this->assertInstanceOf(Export::class, $result);
    }
}
