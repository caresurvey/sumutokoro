<?php

namespace Tool\General\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\General\Domain\Models\Category\CategoryRepository;
use Tool\General\tests\TestCase;
use Tool\General\Infrastructure\Eloquents\EloquentCategory;
use Tool\General\tests\RefreshDatabaseLite;
use Tool\General\tests\TestData;

class EloquentCategoryRepositoryTest extends TestCase
{
    private categoryRepository $categoryRepo;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->categoryRepo = app()->make(CategoryRepository::class);
    }

    /**
     * @test
     * list
     */
    public function list_正常系()
    {
        // テスト対象メソッドを実行
        $results = $this->categoryRepo->list();

        // 検証
        $this->assertSame('介護付き有料老人ホーム', $results[2]);
        $this->assertSame('障がい（障害児通所支援・旧児童デイサービス等）', $results[22]);
    }
}
