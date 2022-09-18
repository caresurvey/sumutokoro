<?php

namespace Tool\General\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\General\Domain\Models\Prefecture\PrefectureRepository;
use Tool\General\tests\TestCase;
use Tool\General\Infrastructure\Eloquents\EloquentPrefecture;
use Tool\General\tests\RefreshDatabaseLite;

class EloquentPrefectureRepositoryTest extends TestCase
{
    private EloquentPrefecture $eloquent;
    private prefectureRepository $prefectureRepo;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->prefectureRepo = app()->make(PrefectureRepository::class);
        $this->eloquent = app()->make(EloquentPrefecture::class);
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
