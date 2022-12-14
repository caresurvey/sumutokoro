<?php

namespace Tool\User\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\User\Domain\Models\SpotIconGenreComment\SpotIconGenreCommentRepository;
use Tool\User\Domain\Models\SpotIconGenreComment\StoreData;
use Tool\User\tests\TestCase;
use Tool\User\tests\RefreshDatabaseLite;

class EloquentSpotIconGenreCommentRepositoryTest extends TestCase
{
    private array $auth;
    private spotIconGenreCommentRepository $spotIconGenreCommentRepo;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->spotIconGenreCommentRepo = app()->make(SpotIconGenreCommentRepository::class);
    }

    /**
     * @test
     */
    public function makeStoreData_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->spotIconGenreCommentRepo->makeStoreData();

        // 検証
        $this->assertInstanceOf(StoreData::class, $result);
    }
}
