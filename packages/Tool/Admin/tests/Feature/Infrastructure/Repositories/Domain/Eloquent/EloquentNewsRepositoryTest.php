<?php

namespace Tool\Admin\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Mockery;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\Admin\Domain\Models\News\NewsRepository;
use Tool\Admin\tests\TestCase;
use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Infrastructure\Eloquents\EloquentLog;
use Tool\Admin\Infrastructure\Eloquents\EloquentNews;
use Tool\Admin\tests\RefreshDatabaseLite;
use Tool\Admin\tests\TestData;

class EloquentNewsRepositoryTest extends TestCase
{
    private array $auth;
    private EloquentLog $log;
    private EloquentNews $eloquent;
    private newsRepository $newsRepo;
    private User $user;
    private TestData $dataData;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->newsRepo = app()->make(NewsRepository::class);
        $this->eloquent = app()->make(EloquentNews::class);
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
    public function list_正常系()
    {
        // テスト対象メソッドを実行
        $results = $this->newsRepo->list();

        // 検証
        $this->assertIsInt($results['news'][0]['id']);
        $this->assertSame(1, $results['current']);
        $this->assertIsInt($results['totalCount']);
        $this->assertIsInt($results['fullPage']);
        $this->assertIsInt($results['limit']);
        $this->assertStringContainsString('page=1', $results['linkTag']);
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

        // テスト対象メソッドを実行
        $result = $this->newsRepo->store($this->testData->requestNewsStore(), $this->auth);

        // 最後に保存されたデータを検証用に取得
        $id = $this->eloquent->orderBy('id', 'desc')->first()->id;
        $check = $this->eloquent->where('id', $id)->orderBy('id', 'desc')->first();

        // 実行後のデータカウント
        $afterCount = $this->eloquent->count();
        $afterCountLog = $this->eloquentLog->count();

        // 検証
        $this->assertInstanceOf(LogicResponse::class, $result);
        $this->assertTrue($result->getResult());
        $this->assertSame('追加お知らせ', $check->name);
        $this->assertSame(1, $check->user_id);

        // 処理後のレコード数をチェック
        $this->assertSame($beforeCount + 1, $afterCount); // レコードが増えたかチェック
        $this->assertSame($beforeCountLog + 1, $afterCountLog);
    }

    /**
     * @test
     */
    public function edit_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->newsRepo->edit(1, $this->auth);

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

        // テスト対象メソッドを実行
        $result = $this->newsRepo->update($this->testData->requestNewsUpdate(), $this->auth);

        // 変更されたデータを検証用に取得
        $check = $this->eloquent->where('id', $this->testData->requestNewsUpdate()['news']['id'])->first();

        // 実行後のレコード数
        $afterCount = $this->eloquent->count();
        $afterCountLog = $this->eloquentLog->count();

        // 検証
        $this->assertInstanceOf(LogicResponse::class, $result);
        $this->assertTrue($result->getResult());
        $this->assertSame(1, $check->id);
        $this->assertSame(1, $check->display);
        $this->assertSame('変更お知らせ', $check->name);
        $this->assertSame(1, $check->user_id);

        // 処理後のレコード数をチェック
        $this->assertSame($beforeCount, $afterCount); // レコード数が変わってないかチェック
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

        // 削除するIDを取得
        $target = $this->eloquent->orderBy('id', 'desc')->first();

        // テスト対象メソッドを実行
        $result = $this->newsRepo->remove($target->id, $this->auth);

        // 実行後のレコード数
        $afterCount = $this->eloquent->count();
        $afterCountLog = $this->eloquentLog->count();

        // 検証
        $this->assertInstanceOf(LogicResponse::class, $result);
        $this->assertTrue($result->getResult());

        // 処理後のレコード数をチェック
        $this->assertSame($beforeCount - 1, $afterCount); // レコード数が減ったかチェック
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
        $result = $this->newsRepo->display(2, $this->auth);

        // 最後に保存されたデータを検証用に取得
        $check = $this->eloquent->where('id', 2)->orderBy('id', 'desc')->first();

        // 実行後のレコード数
        $afterCount = $this->eloquent->count();
        $afterCountLog = $this->eloquentLog->count();

        // 検証
        $this->assertInstanceOf(LogicResponse::class, $result);
        $this->assertTrue($result->getResult());
        $this->assertSame(2, $check->id);

        // 処理後のレコード数をチェック
        $this->assertSame($beforeCount, $afterCount); // レコード数が変わってないかチェック
        $this->assertSame($beforeCountLog + 1, $afterCountLog);
    }
}
