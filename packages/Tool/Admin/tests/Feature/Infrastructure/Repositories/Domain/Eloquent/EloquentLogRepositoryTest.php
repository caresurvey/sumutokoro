<?php

namespace Tool\Admin\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\Admin\Domain\Models\Log\LogRepository;
use Tool\Admin\tests\TestCase;
use Tool\Admin\Infrastructure\Eloquents\EloquentLog;
use Tool\Admin\tests\RefreshDatabaseLite;
use Tool\Admin\tests\TestData;

class EloquentLogRepositoryTest extends TestCase
{
    private array $auth;
    private EloquentLog $eloquent;
    private logRepository $logRepo;
    private User $user;
    private TestData $dataData;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->logRepo = app()->make(LogRepository::class);
        $this->eloquent = app()->make(EloquentLog::class);

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
        $results = $this->logRepo->list();

        // 検証
        $this->assertIsInt($results['logs'][0]['id']);
        $this->assertSame(1, $results['current']);
        $this->assertIsInt($results['totalCount']);
        $this->assertIsInt($results['fullPage']);
        $this->assertIsInt($results['limit']);
        $this->assertStringContainsString('page=1', $results['linkTag']);
    }

    /**
     * @test
     */
    public function show_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->logRepo->show(1);

        // 検証
        $this->assertSame(1, $result['id']);
    }
}
