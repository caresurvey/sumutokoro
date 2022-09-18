<?php

namespace Tool\User\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\User\Domain\Models\Prefecture\PrefectureRepository;
use Tool\User\tests\TestCase;
use Tool\User\Infrastructure\Eloquents\EloquentPrefecture;
use Tool\User\tests\RefreshDatabaseLite;
use Tool\User\tests\TestData;

class EloquentPrefectureRepositoryTest extends TestCase
{
    private array $auth;
    private EloquentPrefecture $eloquent;
    private prefectureRepository $prefectureRepo;
    private User $user;
    private TestData $dataData;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->prefectureRepo = app()->make(PrefectureRepository::class);
        $this->eloquent = app()->make(EloquentPrefecture::class);

        // テストデータ作成
        $this->testData = new TestData('test');
    }

    /**
     * @test
     * list
     */
    public function list_正常系()
    {
        // テスト対象メソッドを実行
        $results = $this->prefectureRepo->list();

        // 検証
        $this->assertSame('指定なし', $results[1]);
        $this->assertSame('北海道', $results[2]);
        $this->assertSame('沖縄県', $results[48]);
    }
}
