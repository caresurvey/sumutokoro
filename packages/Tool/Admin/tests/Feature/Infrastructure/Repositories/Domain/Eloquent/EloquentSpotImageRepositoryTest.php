<?php

namespace Tool\Admin\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\Admin\Domain\Models\SpotImage\SpotImageRepository;
use Tool\Admin\tests\TestCase;
use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpotImage;
use Tool\Admin\Infrastructure\Eloquents\EloquentLog;
use Tool\Admin\tests\RefreshDatabaseLite;
use Tool\Admin\tests\TestData;

class EloquentSpotImageRepositoryTest extends TestCase
{
    private array $auth;
    private EloquentSpotImage $eloquent;
    private EloquentLog $log;
    private spotImageRepository $spotImageRepo;
    private User $user;
    private TestData $dataData;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->spotImageRepo = app()->make(SpotImageRepository::class);
        $this->eloquent = app()->make(EloquentSpotImage::class);
        $this->eloquentLog = app()->make(EloquentLog::class);

        // テストデータ作成
        $this->testData = new TestData('photos/spots');

        // ユーザー情報
        $this->auth['id'] = 1;
        $this->auth['name'] = 'システム管理者';
        $this->auth['role_id'] = 1;
        $this->auth['role_name'] = '権限';
    }

    /**
     * @test
     * store
     */
    public function save_正常系()
    {
        // 実行前のデータカウント
        $beforeCount = $this->eloquent->count();
        $beforeCountLog = $this->eloquentLog->count();

        // テスト対象メソッドを実行
        $result = $this->spotImageRepo->save(1, $this->testData->requestSpotImageStore(), $this->auth);

        // 最後に保存されたデータを検証用に取得
        $id = $this->eloquent->orderBy('id', 'desc')->first()->id;
        $check = $this->eloquent->where('id', $id)->orderBy('id', 'desc')->first();

        // 実行後のデータカウント
        $afterCount = $this->eloquent->count();
        $afterCountLog = $this->eloquentLog->count();

        // 実行後のテストファイル削除
        $this->testData->removeTestFile($check['name']);

        // 検証
        $this->assertTrue($result);
        $this->assertSame('1_test', $check['name']);

        // 処理後のレコード数をチェック
        $this->assertSame($beforeCount + 1, $afterCount); // レコードが増えたかチェック
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

        // テスト用のダミーファイル作成
        $this->testData->makeTestFile($target->id . '_test');

        // テストデータ
        $post['photo']['delete']['id'] = $target->id;
        $post['photo']['delete']['on'] = '1';
        $post['photo']['delete']['name'] = $target->id . '_test';

        // テスト対象メソッドを実行
        $result = $this->spotImageRepo->remove($target->id, $post, $this->auth);

        // 実行後のレコード数
        $afterCount = $this->eloquent->count();
        $afterCountLog = $this->eloquentLog->count();

        // 検証
        $this->assertTrue($result);

        // 処理後のレコード数をチェック
        $this->assertSame($beforeCount - 1, $afterCount); // レコード数が減ったかチェック
        $this->assertSame($beforeCountLog + 1, $afterCountLog);
    }

    /**
     * @test
     */
    public function remove_正常系／deleteのidがない()
    {
        // 実行前のレコード数
        $beforeCount = $this->eloquent->count();
        $beforeCountLog = $this->eloquentLog->count();

        // 削除するIDを取得
        $target = $this->eloquent->orderBy('id', 'desc')->first();

        // テスト対象メソッドを実行
        $result = $this->spotImageRepo->remove($target->id, [], $this->auth);

        // 実行後のレコード数
        $afterCount = $this->eloquent->count();
        $afterCountLog = $this->eloquentLog->count();

        // 検証
        $this->assertTrue($result);

        // 処理後のレコード数をチェック
        $this->assertSame($beforeCount, $afterCount);
        $this->assertSame($beforeCountLog, $afterCountLog);
    }

    /**
     * @test
     */
    public function remove_正常系／deleteのon要素が0()
    {
        // 実行前のレコード数
        $beforeCount = $this->eloquent->count();
        $beforeCountLog = $this->eloquentLog->count();

        // 削除するIDを取得
        $target = $this->eloquent->orderBy('id', 'desc')->first();

        // テストデータ
        $post['photo']['delete']['id'] = $target->id;
        $post['photo']['delete']['on'] = '0';

        // テスト対象メソッドを実行
        $result = $this->spotImageRepo->remove($target->id, $post, $this->auth);

        // 実行後のレコード数
        $afterCount = $this->eloquent->count();
        $afterCountLog = $this->eloquentLog->count();

        // 検証
        $this->assertTrue($result);

        // 処理後のレコード数をチェック
        $this->assertSame($beforeCount, $afterCount);
        $this->assertSame($beforeCountLog, $afterCountLog);
    }
}
