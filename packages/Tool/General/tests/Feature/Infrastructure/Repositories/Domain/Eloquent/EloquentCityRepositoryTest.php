<?php

namespace Tool\General\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\General\Domain\Models\City\CityRepository;
use Tool\General\tests\TestCase;
use Tool\General\Infrastructure\Eloquents\EloquentCity;
use Tool\General\tests\RefreshDatabaseLite;
use Tool\General\tests\TestData;

class EloquentCityRepositoryTest extends TestCase
{
    private cityRepository $cityRepo;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->cityRepo = app()->make(CityRepository::class);
    }

    /**
     * @test
     * list
     */
    public function list_正常系()
    {
        // テスト対象メソッドを実行
        $results = $this->cityRepo->list();

        // 検証
        $this->assertSame('札幌市', $results[2]);
        $this->assertSame('目梨郡羅臼町', $results[180]);
    }
}
