<?php

namespace Tool\General\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\General\tests\TestCase;
use Tool\General\Domain\Models\Icon\IconRepository;
use Tool\General\Infrastructure\Eloquents\EloquentSpotIconStatus;
use Tool\General\tests\RefreshDatabaseLite;

class EloquentIconRepositoryTest extends TestCase
{
    private EloquentSpotIconStatus $eloquent;
    private iconRepository $iconRepo;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->iconRepo = app()->make(IconRepository::class);
        $this->eloquent = app()->make(EloquentSpotIconStatus::class);
    }

    /**
     * @test
     * makeEditData
     */
    public function makeDetailData_正常系()
    {
        // テスト対象メソッドを実行
        $results = $this->iconRepo->makeDetailData(1);

        // 検証
        $this->assertSame('対応種別', $results['status']['name']);
        $this->assertSame(6, count($results['status']['data']));
        $this->assertSame('看護体制', $results['nursing']['name']);
        $this->assertSame(15, count($results['nursing']['data']));
        $this->assertSame('介護体制', $results['care']['name']);
        $this->assertSame(10, count($results['care']['data']));
        $this->assertSame('個室内状況', $results['privatespace']['name']);
        $this->assertSame(7, count($results['privatespace']['data']));
        $this->assertSame('食事体制', $results['eating']['name']);
        $this->assertSame(5, count($results['eating']['data']));
        $this->assertSame('健康管理サービス', $results['health']['name']);
        $this->assertSame(5, count($results['health']['data']));
        $this->assertSame('生活サービス', $results['life']['name']);
        $this->assertSame(8, count($results['life']['data']));
        $this->assertSame('入院時サービス', $results['hospitalization']['name']);
        $this->assertSame(4, count($results['hospitalization']['data']));
        $this->assertSame('その他項目', $results['other']['name']);
        $this->assertSame(5, count($results['other']['data']));
    }

    /**
     * @test
     */
    public function setComments_正常系()
    {
        // テストデータ
        $spot_icon_status['spot_icon_item']['spot_icon_genre']['id'] = 3;

        $comments[] = ['comment'=>'コメント1', 'spot_icon_genre_id' => 2];
        $comments[] = ['comment'=>'コメント2', 'spot_icon_genre_id' => 3];
        $comments[] = ['comment'=>'コメント3', 'spot_icon_genre_id' => 4];
        $comments[] = ['comment'=>'コメント4', 'spot_icon_genre_id' => 5];
        $comments[] = ['comment'=>'コメント5', 'spot_icon_genre_id' => 6];

        // テスト対象メソッドを実行
        $result = $this->iconRepo->setComments($spot_icon_status, $comments);

        // 検証
        $this->assertSame('コメント2', $result);
    }
}
