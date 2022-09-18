<?php

namespace Tool\User\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\User\Domain\Models\SpotPrice\SpotPriceRepository;
use Tool\User\Domain\Models\SpotPrice\StoreData;
use Tool\User\tests\TestCase;
use Tool\User\tests\RefreshDatabaseLite;

class EloquentSpotPriceRepositoryTest extends TestCase
{
    private array $auth;
    private spotPriceRepository $spotPriceRepo;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->spotPriceRepo = app()->make(SpotPriceRepository::class);
    }

    /**
     * @test
     * list
     */
    public function list_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->spotPriceRepo->makeStoreData();

        // 検証
        $this->assertInstanceOf(StoreData::class, $result);
    }
}
