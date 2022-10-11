<?php

namespace Tool\User\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\User\Domain\Models\SpotIconStatus\SpotIconStatusRepository;
use Tool\User\Domain\Models\SpotIconStatus\StoreData;
use Tool\User\tests\TestCase;
use Tool\User\tests\RefreshDatabaseLite;

class EloquentSpotIconStatusRepositoryTest extends TestCase
{
    private array $auth;
    private spotIconStatusRepository $spotIconStatusRepo;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->spotIconStatusRepo = app()->make(SpotIconStatusRepository::class);
    }

    /**
     * @test
     */
    public function makeStoreData_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->spotIconStatusRepo->makeStoreData();

        // 検証
        $this->assertInstanceOf(StoreData::class, $result);
    }
}
