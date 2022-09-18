<?php

namespace Tool\Admin\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\Admin\Domain\Models\SpotPrice\SpotPriceRepository;
use Tool\Admin\Domain\Models\SpotPrice\StoreData;
use Tool\Admin\tests\TestCase;
use Tool\Admin\tests\RefreshDatabaseLite;

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
