<?php

namespace Tool\Admin\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Mockery;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\Admin\Domain\Models\Company\CompanyRepository;
use Tool\Admin\Domain\Models\Company\CompanySearch;
use Tool\Admin\Domain\Models\Company\Export;
use Tool\Admin\tests\TestCase;
use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Infrastructure\Eloquents\EloquentCompany;
use Tool\Admin\Infrastructure\Eloquents\EloquentLog;
use Tool\Admin\tests\RefreshDatabaseLite;
use Tool\Admin\tests\TestData;

class EloquentCompanyRepositoryTest extends TestCase
{
    private array $auth;
    private EloquentCompany $eloquent;
    private EloquentLog $log;
    private companyRepository $companyRepo;
    private User $user;
    private TestData $dataData;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->companyRepo = app()->make(CompanyRepository::class);
        $this->eloquent = app()->make(EloquentCompany::class);
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
        // Searchオブジェクトをモックでセット
        $companySearch = Mockery::mock(CompanySearch::class);
        $this->instance(CompanySearch::class, $companySearch);
        $companySearch->shouldReceive('isSimple')->once()->andReturn(false);
        $companySearch->shouldReceive('getQuery')->once()->andReturn('');

        // テスト対象メソッドを実行
        $results = $this->companyRepo->list($companySearch, $this->auth);

        // 検証
        $this->assertIsInt($results['companies'][0]['id']);
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
        $result = $this->companyRepo->store($this->testData->requestCompanyStore(), $this->auth);

        // 最後に保存されたデータを検証用に取得
        $id = $this->eloquent->orderBy('id', 'desc')->first()->id;
        $check = $this->eloquent->where('id', $id)->orderBy('id', 'desc')->first();

        // 実行後のデータカウント
        $afterCount = $this->eloquent->count();
        $afterCountLog = $this->eloquentLog->count();

        // 検証
        $this->assertInstanceOf(LogicResponse::class, $result);
        $this->assertTrue($result->getResult());
        $this->assertSame('追加法人', $check->name);
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
        $result = $this->companyRepo->edit(1, $this->auth);

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
        $result = $this->companyRepo->update($this->testData->requestCompanyUpdate(), $this->auth);

        // 変更されたデータを検証用に取得
        $check = $this->eloquent->where('id', $this->testData->requestCompanyUpdate()['company']['id'])->first();

        // 実行後のレコード数
        $afterCount = $this->eloquent->count();
        $afterCountLog = $this->eloquentLog->count();

        // 検証
        $this->assertInstanceOf(LogicResponse::class, $result);
        $this->assertTrue($result->getResult());
        $this->assertSame(1, $check->id);
        $this->assertSame(1, $check->display);
        $this->assertSame('変更法人', $check->name);
        $this->assertSame(1, $check->user_id);

        // 処理後のレコード数をチェック
        $this->assertSame($beforeCount, $afterCount); // レコード数が変わってないかチェック
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
        $result = $this->companyRepo->display(2, $this->auth);

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
        $result = $this->companyRepo->remove($target->id, $this->auth);

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
    public function count_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->companyRepo->count();

        // 検証
        $this->assertIsInt($result);
    }

    /**
     * @test
     */
    public function keyword_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->companyRepo->keyword(['keyword' => '法人5']);

        // 検証
        $this->assertSame(5, $result[0]['id']);
    }

    /**
     * @test
     */
    public function keyword_selected_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->companyRepo->keyword_selected(['keyword' => '法人', 'selected' => '2|3|6|7']);

        // 検証
        $this->assertSame(4, $result[0]['id']);
        $this->assertSame(5, $result[1]['id']);
        $this->assertSame(8, $result[2]['id']);
        $this->assertSame(9, $result[3]['id']);
        $this->assertSame(10, $result[4]['id']);
    }

    /**
     * @test
     * store
     */
    public function export_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->companyRepo->export();

        // 検証
        $this->assertInstanceOf(Export::class, $result);
    }
}
