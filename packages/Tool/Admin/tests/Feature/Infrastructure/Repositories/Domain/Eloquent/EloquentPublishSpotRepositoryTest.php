<?php

namespace Tool\Admin\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Mockery;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\Admin\Domain\Models\Spot\PublishSpotRepository;
use Tool\Admin\Infrastructure\Repositories\Domain\Publish\ElementarySpot;
use Tool\Admin\tests\TestCase;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpot;
use Tool\Admin\tests\RefreshDatabaseLite;
use Tool\Admin\tests\TestData;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\FormatConditions;

class EloquentPublishSpotRepositoryTest extends TestCase
{
    private array $auth;
    private EloquentSpot $eloquent;
    private PublishSpotRepository $publishSpot;
    private User $user;
    private TestData $dataData;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->publishSpot = app()->make(PublishSpotRepository::class);
        $this->eloquent = app()->make(EloquentSpot::class);

        // テストデータ作成
        $this->testData = new TestData('test');
    }

    /**
     * @test
     */
    public function getPublishSpots_正常系()
    {
        // テストデータ
        $area = new class{
            public function toArray() {
                return ['data'];
            }
        };
        $book = new class{
            public function toArray() {
                return ['data'];
            }
        };

        $area_centers[0] = [
            'id' => 1,
            'book_label' => 'label',
            'book_reorder' => 1,
            'area_section_id' => 2,
            'city_id' => 2,
            'area' => $area,
            'area_section' => [
                'id' => 1,
                'name' => 'name',
                'book' => $book
            ],
            'spots' => [
                [
                    'id' => 1,
                    'name' => 'name1'
                ],
                [
                    'id' => 2,
                    'name' => 'name2'
                ],
            ]
        ];

        // テスト対象メソッドを実行
        $result = $this->publishSpot->getPublishSpots($area_centers);

        // 検証
        $this->assertInstanceOf(ElementarySpot::class, $result);
    }

    /**
     * @test
     */
    public function makePublishSpots_正常系()
    {
        // FormatConditionsオブジェクトをモックでセット
        $data[0]['spots'] = [1, 2, 3, 4, 5];
        $data[1]['spots'] = [2, 3, 4, 5, 6];
        $elementarySpot = Mockery::mock(ElementarySpot::class);
        $elementarySpot->shouldReceive('getData')->once()->andReturn($data);

        // テスト対象メソッドを実行
        $results = $this->publishSpot->makePublishSpots($elementarySpot);

        // 検証
        $this->assertIsArray($results);

    }

    /**
     * @test
     */
    public function pickupPublishSpots_正常系()
    {
        // テストデータ
        $allSpots = [1, 2, 3, 4, 5];

        // FormatConditionsオブジェクトをセット
        $formatConditions = new FormatConditions([]);

        // テスト対象メソッドを実行
        $results = $this->publishSpot->pickupPublishSpots($allSpots, $formatConditions);

        // 検証
        $this->assertIsArray($results);

    }

    /**
     * @test
     */
    public function splitSpotByQueue_正常系()
    {
        // テストデータ
        $data = [];
        for($i=0; $i<90; $i++) {
            $data[$i]['id'] = $i;
            $data[$i]['name'] = 'テスト';
        }

        // テスト対象メソッドを実行
        $results = $this->publishSpot->splitSpotByQueue($data);

        // 検証
        $this->assertSame(2, count($results));
    }
}
