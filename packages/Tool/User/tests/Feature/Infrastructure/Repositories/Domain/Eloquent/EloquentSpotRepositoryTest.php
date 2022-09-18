<?php

namespace Tool\User\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\User\Domain\Models\Spot\SpotRepository;
use Tool\User\Infrastructure\Eloquents\EloquentLog;
use Tool\User\Infrastructure\Eloquents\EloquentSpotDetail;
use Tool\User\Infrastructure\Eloquents\EloquentSpotIconGenre;
use Tool\User\Infrastructure\Eloquents\EloquentSpotIconGenreComment;
use Tool\User\Infrastructure\Eloquents\EloquentSpotIconItem;
use Tool\User\Infrastructure\Eloquents\EloquentSpotIconStatus;
use Tool\User\Infrastructure\Eloquents\EloquentSpotIconType;
use Tool\User\tests\TestCase;
use Tool\User\Domain\Models\Common\LogicResponse;
use Tool\User\Infrastructure\Eloquents\EloquentSpot;
use Tool\User\tests\RefreshDatabaseLite;
use Tool\User\tests\TestData;

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
        $this->auth['id'] = 3;
        $this->auth['name'] = '登録太郎';
        $this->auth['role_id'] = 3;
        $this->auth['role_name'] = '登録ユーザー';
    }

    /**
     * @test
     * list
     */
    public function list_正常系()
    {
        // 認証されたユーザーにする
        $this->auth['is_authenticated'] = 1;

        // テスト対象メソッドを実行
        $results = $this->spotRepo->list($this->auth);

        // 検証
        $this->assertSame(10, $results['spots'][0]['id']);
        $this->assertSame(1, $results['current']);
        $this->assertSame(10, $results['totalCount']);
        $this->assertIsInt($results['fullPage']);
        $this->assertIsInt($results['limit']);
    }

    /**
     * @test
     */
    public function edit_正常系()
    {
        // 認証されたユーザーにする
        $this->auth['is_authenticated'] = 1;

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
        // 認証されたユーザーにする
        $this->auth['is_authenticated'] = 1;

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
        $this->assertSame(3, $check->user_id);

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
}
