<?php

namespace Tool\Admin\tests\Feature\Application\Controllers;

use Tool\Admin\tests\TestCase;
use Tool\Admin\tests\RefreshDatabaseLite;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\Admin\tests\TestData;
use App\Models\User;

class ContactControllerTest extends TestCase
{
    use RefreshDatabaseLite;
    use WithoutMiddleware;

    private User $user;
    private TestData $dataData;

    public function setUp(): void
    {
        parent::setUp();

        // テストデータ作成
        $this->testData = new TestData('test');

        // ダミーユーザー作成
        $this->user = User::factory(User::class)->create($this->testData->makeUser());
    }

    /**
     * @test
     */
    public function index()
    {
        // アクセス
        $response = $this->actingAs($this->user, 'admin')
            ->get(config('myapp.app_admin_prefix') . '/contact');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Contact index', $response->content());
    }

    /**
     * @test
     */
    public function show()
    {
        // アクセス
        $response = $this->actingAs($this->user, 'admin')
            ->get(config('myapp.app_admin_prefix') . '/contact/1');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Contact show', $response->content());
    }
}
