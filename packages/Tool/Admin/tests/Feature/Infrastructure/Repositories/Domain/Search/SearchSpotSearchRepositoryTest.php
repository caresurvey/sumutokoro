<?php

namespace Tool\Admin\tests\Feature\Infrastructure\Repositories\Domain\Search;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\Admin\Domain\Models\Spot\SpotSearch;
use Tool\Admin\Infrastructure\Repositories\Domain\Search\SearchSpotSearchRepository;
use Tool\Admin\tests\TestCase;
use Tool\Admin\tests\RefreshDatabaseLite;
use Tool\Admin\tests\TestData;

class SearchSpotSearchRepositoryTest extends TestCase
{
    private array $auth;
    private searchSpotSearchRepository $searchSpotSearchRepo;
    private User $user;
    private TestData $dataData;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->searchSpotSearchRepo = app()->make(SearchSpotSearchRepository::class);

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
     */
    public function makeSearch_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->searchSpotSearchRepo->makeSearch([], '');

        // 検証
        $this->assertInstanceOf(SpotSearch::class, $result);
    }
}
