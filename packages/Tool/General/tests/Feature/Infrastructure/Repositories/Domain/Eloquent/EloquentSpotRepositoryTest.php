<?php

namespace Tool\General\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\General\Domain\Models\Spot\SpotRepository;
use Tool\General\Domain\Models\Spot\SpotSearch;
use Tool\General\Infrastructure\Eloquents\EloquentSpotDetail;
use Tool\General\Infrastructure\Eloquents\EloquentSpotIconGenre;
use Tool\General\Infrastructure\Eloquents\EloquentSpotIconGenreComment;
use Tool\General\Infrastructure\Eloquents\EloquentSpotIconItem;
use Tool\General\Infrastructure\Eloquents\EloquentSpotIconStatus;
use Tool\General\Infrastructure\Eloquents\EloquentSpotIconType;
use Tool\General\tests\TestCase;
use Tool\General\Infrastructure\Eloquents\EloquentSpot;
use Tool\General\tests\RefreshDatabaseLite;

class EloquentSpotRepositoryTest extends TestCase
{
    private spotRepository $spotRepo;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->spotRepo = app()->make(SpotRepository::class);
    }

    /**
     * @test
     * list
     */
    public function list_正常系()
    {
        // 検索オブジェクトを作成
        $search = new SpotSearch([], '');

        // テスト対象メソッドを実行
        $results = $this->spotRepo->list($search);

        // 検証
        $this->assertIsInt($results['spots'][0]['id']);
        $this->assertSame(1, $results['current']);
        $this->assertIsInt($results['fullPage']);
        $this->assertIsInt($results['limit']);
    }

    /**
     * @test
     */
    public function detail_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->spotRepo->detail(1);

        // 検証
        $this->assertSame(1, $result['id']);
    }

    /**
     * @test
     */
    public function count_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->spotRepo->count();

        // 検証
        $this->assertIsInt($result);
    }
}
