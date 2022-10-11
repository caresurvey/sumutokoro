<?php

namespace Tool\User\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Mockery;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\User\Domain\Models\Company\CompanyRepository;
use Tool\User\tests\TestCase;
use Tool\User\Domain\Models\Common\LogicResponse;
use Tool\User\Infrastructure\Eloquents\EloquentCompany;
use Tool\User\Infrastructure\Eloquents\EloquentLog;
use Tool\User\tests\RefreshDatabaseLite;
use Tool\User\tests\TestData;

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
        $this->auth['id'] = 2;
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
        $results = $this->companyRepo->list($this->auth);

        // 検証
        $this->assertSame(2, $results['companies'][0]['id']);
        $this->assertSame(1, $results['current']);
        $this->assertSame(1, $results['totalCount']);
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
        $result = $this->companyRepo->edit(2, $this->auth);

        // 検証
        $this->assertSame(2, $result['id']);
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
        $this->assertSame('変更法人', $check->name);

        // 処理後のレコード数をチェック
        $this->assertSame($beforeCount, $afterCount); // レコード数が変わってないかチェック
        $this->assertSame($beforeCountLog + 1, $afterCountLog);
    }

    /**
     * @test
     */
    public function display_正常系()
    {
        // 認証されたユーザーにする
        $this->auth['is_authenticated'] = 1;

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
}
