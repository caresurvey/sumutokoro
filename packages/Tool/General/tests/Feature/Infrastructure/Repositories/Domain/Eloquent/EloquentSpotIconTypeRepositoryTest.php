<?php

namespace Tool\General\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\General\tests\TestCase;
use Tool\General\Domain\Models\SpotIconType\SpotIconTypeRepository;
use Tool\General\Infrastructure\Eloquents\EloquentSpotIconType;
use Tool\General\tests\RefreshDatabaseLite;

class EloquentSpotIconTypeRepositoryTest extends TestCase
{
    private EloquentSpotIconType $eloquent;
    private spotIconTypeRepository $spotIconTypeRepo;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->eloquent = app()->make(EloquentSpotIconType::class);
        $this->spotIconTypeRepo = app()->make(SpotIconTypeRepository::class);
    }

    /**
     * @test
     */
    public function list_正常系()
    {
        // テスト対象メソッドを実行
        $results = $this->spotIconTypeRepo->list();

        // 検証
        $this->assertSame(1, $results[0]['id']);
        $this->assertSame(2, $results[1]['id']);
        $this->assertSame(3, $results[2]['id']);

    }
}
