<?php

namespace Tool\Admin\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\Admin\Domain\Models\Contact\ContactRepository;
use Tool\Admin\tests\TestCase;
use Tool\Admin\Infrastructure\Eloquents\EloquentContact;
use Tool\Admin\tests\RefreshDatabaseLite;
use Tool\Admin\tests\TestData;

class EloquentContactRepositoryTest extends TestCase
{
    private array $auth;
    private EloquentContact $eloquent;
    private contactRepository $contactRepo;
    private User $user;
    private TestData $dataData;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->contactRepo = app()->make(ContactRepository::class);
        $this->eloquent = app()->make(EloquentContact::class);

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
        $results = $this->contactRepo->list();

        // 検証
        $this->assertIsInt($results['contacts'][0]['id']);
        $this->assertSame(1, $results['current']);
        $this->assertSame(100, $results['totalCount']);
        $this->assertIsInt($results['fullPage']);
        $this->assertIsInt($results['limit']);
        $this->assertStringContainsString('page=1', $results['linkTag']);
    }

    /**
     * @test
     */
    public function show_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->contactRepo->show(1);

        // 検証
        $this->assertSame(1, $result['id']);
    }

    /**
     * @test
     */
    public function count_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->contactRepo->count();

        // 検証
        $this->assertIsInt($result);
    }
}
