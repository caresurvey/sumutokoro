<?php

namespace Tool\Admin\tests\Feature\Application\Controllers;

use Tool\Admin\tests\TestCase;
use Tool\Admin\tests\RefreshDatabaseLite;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\Admin\tests\TestData;
use App\Models\User;

class UserControllerTest extends TestCase
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
            ->get(config('myapp.app_admin_prefix') . '/user');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('User index', $response->content());
    }

    /**
     * @test
     */
    public function store()
    {
        // POSTする
        $response = $this->actingAs($this->user, 'admin')
            ->followingRedirects()
            ->post(config('myapp.app_admin_prefix') . '/user', $this->testData->requestUserStore());

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('User edit', $response->content());
    }

    /**
     * @test
     */
    public function edit()
    {
        // アクセス
        $response = $this->actingAs($this->user, 'admin')
            ->followingRedirects()
            ->get(config('myapp.app_admin_prefix') . '/user/3/edit');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('User edit', $response->content());
    }

    /**
     * @test
     */
    public function update()
    {
        // アクセスする
        $response = $this->actingAs($this->user, 'admin')
            ->put(config('myapp.app_admin_prefix') . '/user/3', $this->testData->requestUserUpdate());

        // チェック
        $this->assertDatabaseHas('users', ['name' => '変更ユーザー']);
        $response->assertStatus(302);
    }

    /**
     * @test
     */
    public function destroy()
    {
        // アクセスする
        $response = $this->actingAs($this->user, 'admin')
            ->followingRedirects()
            ->delete(config('myapp.app_admin_prefix') . '/user/90');

        // チェック
        $response->assertOk();
    }

    /**
     * @test
     */
    public function enabled()
    {
        // アクセスする
        $response = $this->actingAs($this->user, 'admin')
            ->followingRedirects()
            ->get(config('myapp.app_admin_prefix') . '/user/enabled/2');

        // チェック
        $response->assertOk();
    }
}
