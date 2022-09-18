<?php

namespace Tool\Admin\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\Admin\Domain\Models\SpotIconGenreComment\SpotIconGenreCommentRepository;
use Tool\Admin\Domain\Models\SpotIconGenreComment\StoreData;
use Tool\Admin\tests\TestCase;
use Tool\Admin\tests\RefreshDatabaseLite;

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
     * list
     */
    public function list_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->spotIconGenreCommentRepo->makeStoreData();

        // 検証
        $this->assertInstanceOf(StoreData::class, $result);
    }
}
