<?php

namespace Tool\General\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Tool\General\tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\General\Domain\Models\News\NewsRepository;
use Tool\General\Infrastructure\Eloquents\EloquentNews;
use Tool\General\tests\RefreshDatabaseLite;

class EloquentNewsRepositoryTest extends TestCase
{
    private array $auth;
    private EloquentNews $eloquent;
    private newsRepository $newsRepo;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->eloquent = app()->make(EloquentNews::class);
        $this->newsRepo = app()->make(NewsRepository::class);
    }

    /**
     * @test
     * list
     */
    public function list_正常系()
    {
        // テスト対象メソッドを実行
        $results = $this->newsRepo->list();

        // 検証
        $this->assertSame(100, $results['news'][0]['id']);
        $this->assertSame(1, $results['current']);
        $this->assertSame(100, $results['totalCount']);
        $this->assertIsInt($results['fullPage']);
    }

    /**
     * @test
     */
    public function detail_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->newsRepo->detail(1);

        // 検証
        $this->assertSame(1, $result['id']);
    }
}
