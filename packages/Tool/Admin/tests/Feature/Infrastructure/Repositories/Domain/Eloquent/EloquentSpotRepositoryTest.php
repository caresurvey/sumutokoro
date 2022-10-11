<?php

namespace Tool\Admin\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Mockery;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\Admin\Domain\Models\Spot\Export\ExportGeneral;
use Tool\Admin\Domain\Models\Spot\SpotRepository;
use Tool\Admin\Domain\Models\Spot\SpotSearch;
use Tool\Admin\Infrastructure\Eloquents\EloquentLog;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpotDetail;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpotIconGenre;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpotIconGenreComment;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpotIconItem;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpotIconStatus;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpotIconType;
use Tool\Admin\tests\TestCase;
use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpot;
use Tool\Admin\tests\RefreshDatabaseLite;
use Tool\Admin\tests\TestData;

class EloquentSpotRepositoryTest extends TestCase
{
    private array $auth;
    private EloquentLog $log;
    private EloquentSpot $eloquent;
    private EloquentSpotDetail $eloquentSpotDetail;
    private EloquentSpotIconGenre $eloquentSpotIconGenre;
    private EloquentSpotIconGenreComment $eloquentSpotIconGenreComment;
    private EloquentSpotIconItem $eloquentSpotIconItem;
    private EloquentSpotIconStatus $eloquentSpotIconStatus;
    private EloquentSpotIconType $eloquentSpotIconType;
    private spotRepository $spotRepo;
    private User $user;
    private TestData $dataData;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->eloquentLog = app()->make(EloquentLog::class);
        $this->eloquent = app()->make(EloquentSpot::class);
        $this->eloquentSpotDetail = app()->make(EloquentSpotDetail::class);
        $this->eloquentSpotIconGenre = app()->make(EloquentSpotIconGenre::class);
        $this->eloquentSpotIconGenreComment = app()->make(EloquentSpotIconGenreComment::class);
        $this->eloquentSpotIconItem = app()->make(EloquentSpotIconItem::class);
        $this->eloquentSpotIconStatus = app()->make(EloquentSpotIconStatus::class);
        $this->eloquentSpotIconType = app()->make(EloquentSpotIconType::class);
        $this->spotRepo = app()->make(SpotRepository::class);

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
    public function list_正常系()
    {
        // Searchオブジェクトをモックでセット
        $spotSearch = Mockery::mock(SpotSearch::class);
        $this->instance(SpotSearch::class, $spotSearch);
        $spotSearch->shouldReceive('isSimple')->once()->andReturn(false);
        $spotSearch->shouldReceive('getQuery')->once()->andReturn('');

        // テスト対象メソッドを実行
        $results = $this->spotRepo->list($spotSearch, $this->auth);

        // 検証
        $this->assertIsInt($results['spots'][0]['id']);
        $this->assertSame(1, $results['current']);
        $this->assertIsInt($results['totalCount']);
        $this->assertIsInt($results['fullPage']);
        $this->assertIsInt($results['limit']);
    }

    /**
     * @test
     * store
     */
    public function store_正常系()
    {
        // 実行前のデータカウント
        $beforeCount = $this->eloquent->count();
        $beforeCountLog = $this->eloquentLog->count();
        $beforeCountSpotDetail = $this->eloquentSpotDetail->count();
        $beforeCountSpotIconGenre = $this->eloquentSpotIconGenre->count();
        $beforeCountSpotIconGenreComment = $this->eloquentSpotIconGenreComment->count();
        $beforeCountSpotIconItem = $this->eloquentSpotIconItem->count();
        $beforeCountSpotIconStatus = $this->eloquentSpotIconStatus->count();
        $beforeCountSpotIconType = $this->eloquentSpotIconType->count();

        // テスト対象メソッドを実行
        $result = $this->spotRepo->store($this->testData->requestSpotStore(), $this->testData->spotEmptyData(), $this->auth);

        // 最後に保存されたデータを検証用に取得
        $id = $this->eloquent->orderBy('id', 'desc')->first()->id;
        $check = $this->eloquent->where('id', $id)->orderBy('id', 'desc')->first();

        // 実行後のデータカウント
        $afterCount = $this->eloquent->count();
        $afterCountLog = $this->eloquentLog->count();
        $afterCountSpotDetail = $this->eloquentSpotDetail->count();
        $afterCountSpotIconGenre = $this->eloquentSpotIconGenre->count();
        $afterCountSpotIconGenreComment = $this->eloquentSpotIconGenreComment->count();
        $afterCountSpotIconItem = $this->eloquentSpotIconItem->count();
        $afterCountSpotIconStatus = $this->eloquentSpotIconStatus->count();
        $afterCountSpotIconType = $this->eloquentSpotIconType->count();

        // 検証
        $this->assertInstanceOf(LogicResponse::class, $result);
        $this->assertTrue($result->getResult());
        $this->assertSame('追加事業所', $check->name);
        $this->assertSame(1, $check->user_id);

        // 処理後のレコード数をチェック
        $this->assertSame($beforeCount + 1, $afterCount);
        $this->assertSame($beforeCountSpotDetail + 1, $afterCountSpotDetail);
        $this->assertSame($beforeCountSpotIconGenre, $afterCountSpotIconGenre);
        $this->assertSame($beforeCountSpotIconGenreComment + 9, $afterCountSpotIconGenreComment);
        $this->assertSame($beforeCountSpotIconItem, $afterCountSpotIconItem);
        $this->assertSame($beforeCountSpotIconStatus + 65, $afterCountSpotIconStatus);
        $this->assertSame($beforeCountSpotIconType, $afterCountSpotIconType);
        $this->assertSame($beforeCountLog + 1, $afterCountLog);
    }

    /**
     * @test
     */
    public function edit_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->spotRepo->edit(1, $this->auth);

        // 検証
        $this->assertSame(1, $result['id']);
    }

    /**
     * @test
     */
    public function update_正常系()
    {
        // 実行前のレコード数
        $beforeCount = $this->eloquent->count();
        $beforeCountLog = $this->eloquentLog->count();
        $beforeCountSpotDetail = $this->eloquentSpotDetail->count();
        $beforeCountSpotIconGenre = $this->eloquentSpotIconGenre->count();
        $beforeCountSpotIconGenreComment = $this->eloquentSpotIconGenreComment->count();
        $beforeCountSpotIconItem = $this->eloquentSpotIconItem->count();
        $beforeCountSpotIconStatus = $this->eloquentSpotIconStatus->count();
        $beforeCountSpotIconType = $this->eloquentSpotIconType->count();

        // テスト対象メソッドを実行
        $result = $this->spotRepo->update($this->testData->requestSpotUpdate(), $this->auth);

        // 変更されたデータを検証用に取得
        $check = $this->eloquent->where('id', $this->testData->requestSpotUpdate()['spot']['id'])->first();

        // 実行後のレコード数
        $afterCount = $this->eloquent->count();
        $afterCountLog = $this->eloquentLog->count();
        $afterCountSpotDetail = $this->eloquentSpotDetail->count();
        $afterCountSpotIconGenre = $this->eloquentSpotIconGenre->count();
        $afterCountSpotIconGenreComment = $this->eloquentSpotIconGenreComment->count();
        $afterCountSpotIconItem = $this->eloquentSpotIconItem->count();
        $afterCountSpotIconStatus = $this->eloquentSpotIconStatus->count();
        $afterCountSpotIconType = $this->eloquentSpotIconType->count();

        // 検証
        $this->assertInstanceOf(LogicResponse::class, $result);
        $this->assertTrue($result->getResult());
        $this->assertSame($beforeCount, $afterCount); // レコード数が変わってないかチェック
        $this->assertSame(1, $check->id);
        $this->assertSame(1, $check->display);
        $this->assertSame('変更事業所', $check->name);
        $this->assertSame(1, $check->user_id);

        // 処理後のレコード数をチェック
        $this->assertSame($beforeCount, $afterCount);
        $this->assertSame($beforeCountSpotDetail, $afterCountSpotDetail);
        $this->assertSame($beforeCountSpotIconGenre, $afterCountSpotIconGenre);
        $this->assertSame($beforeCountSpotIconGenreComment, $afterCountSpotIconGenreComment);
        $this->assertSame($beforeCountSpotIconItem, $afterCountSpotIconItem);
        $this->assertSame($beforeCountSpotIconStatus, $afterCountSpotIconStatus);
        $this->assertSame($beforeCountSpotIconType, $afterCountSpotIconType);
        $this->assertSame($beforeCountLog + 1, $afterCountLog);
    }

    /**
     * @test
     */
    public function display_正常系()
    {
        // 実行前のレコード数
        $beforeCount = $this->eloquent->count();
        $beforeCountLog = $this->eloquentLog->count();

        // テスト対象メソッドを実行
        $result = $this->spotRepo->display(2, $this->auth);

        // 最後に保存されたデータを検証用に取得
        $check = $this->eloquent->where('id', 2)->orderBy('id', 'desc')->first();

        // 実行後のレコード数
        $afterCount = $this->eloquent->count();
        $afterCountLog = $this->eloquentLog->count();

        // 検証
        $this->assertInstanceOf(LogicResponse::class, $result);
        $this->assertTrue($result->getResult());
        $this->assertSame($beforeCount, $afterCount); // レコード数が変わってないかチェック
        $this->assertSame(2, $check->id);
        $this->assertSame($beforeCountLog + 1, $afterCountLog);
    }

    /**
     * @test
     */
    public function remove_正常系()
    {
        // 実行前のレコード数
        $beforeCount = $this->eloquent->count();
        $beforeCountLog = $this->eloquentLog->count();
        $beforeCountSpotDetail = $this->eloquentSpotDetail->count();
        $beforeCountSpotIconGenre = $this->eloquentSpotIconGenre->count();
        $beforeCountSpotIconGenreComment = $this->eloquentSpotIconGenreComment->count();
        $beforeCountSpotIconItem = $this->eloquentSpotIconItem->count();
        $beforeCountSpotIconStatus = $this->eloquentSpotIconStatus->count();
        $beforeCountSpotIconType = $this->eloquentSpotIconType->count();

        // 削除するIDを取得
        $target = $this->eloquent->orderBy('id', 'desc')->first();

        // テスト対象メソッドを実行
        $result = $this->spotRepo->remove($target->id, $this->auth);

        // 実行後のレコード数
        $afterCount = $this->eloquent->count();
        $afterCountLog = $this->eloquentLog->count();
        $afterCountSpotDetail = $this->eloquentSpotDetail->count();
        $afterCountSpotIconGenre = $this->eloquentSpotIconGenre->count();
        $afterCountSpotIconGenreComment = $this->eloquentSpotIconGenreComment->count();
        $afterCountSpotIconItem = $this->eloquentSpotIconItem->count();
        $afterCountSpotIconStatus = $this->eloquentSpotIconStatus->count();
        $afterCountSpotIconType = $this->eloquentSpotIconType->count();

        // 検証
        $this->assertInstanceOf(LogicResponse::class, $result);
        $this->assertTrue($result->getResult());

        // 処理後のレコード数をチェック
        $this->assertSame($beforeCount - 1, $afterCount);
        $this->assertSame($beforeCountSpotDetail - 1, $afterCountSpotDetail);
        $this->assertSame($beforeCountSpotIconGenre, $afterCountSpotIconGenre);
        $this->assertSame($beforeCountSpotIconGenreComment - 9, $afterCountSpotIconGenreComment);
        $this->assertSame($beforeCountSpotIconItem, $afterCountSpotIconItem);
        $this->assertSame($beforeCountSpotIconStatus - 65, $afterCountSpotIconStatus);
        $this->assertSame($beforeCountSpotIconType, $afterCountSpotIconType);
        $this->assertSame($beforeCountLog + 1, $afterCountLog);
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

    /**
     * @test
     */
    public function keyword_selected_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->spotRepo->keyword_selected(['keyword' => '事業所', 'selected' => '2|3|6|7']);

        // 検証
        $this->assertIsInt($result[0]['id']);
    }

    /**
     * @test
     * store
     */
    public function export_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->spotRepo->export();

        // 検証
        $this->assertInstanceOf(ExportGeneral::class, $result);
    }
}
