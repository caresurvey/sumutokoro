<?php

namespace Tool\Admin\tests\Feature\Application\Controllers;

use Tool\Admin\tests\TestCase;
use Tool\Admin\tests\RefreshDatabaseLite;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\Admin\tests\TestData;
use App\Models\User;

class NewsControllerTest extends TestCase
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
            ->get(config('myapp.app_admin_prefix') . '/news');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('News index', $response->content());
    }

    /**
     * @test
     */
    public function store()
    {
        // POSTする
        $response = $this->actingAs($this->user, 'admin')
            ->followingRedirects()
            ->post(config('myapp.app_admin_prefix') . '/news', $this->testData->requestNewsStore());

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('News edit', $response->content());
    }

    /**
     * @test
     */
    public function edit()
    {
        // アクセス
        $response = $this->actingAs($this->user, 'admin')
            ->get(config('myapp.app_admin_prefix') . '/news/3/edit');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('News edit', $response->content());
    }

    /**
     * @test
     */
    public function update()
    {
        $post = [
            'news' => [
                'id' => 1,
                'display' => 1,
                'preview' => 1,
                'name' => 'お知らせ名変更',
                'body' => '本文',
                'more' => '続き',
                'url' => '',
                'user_id' => 1,
            ]
        ];

        // アクセスする
        $response = $this->actingAs($this->user, 'admin')
            ->put(config('myapp.app_admin_prefix') . '/news/3', $post);

        // チェック
        $this->assertDatabaseHas('news', ['name' => 'お知らせ名変更']);
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
            ->delete(config('myapp.app_admin_prefix') . '/news/3');

        // チェック
        $response->assertOk();
    }

    /**
     * @test
     */
    public function display()
    {
        // アクセスする
        $response = $this->actingAs($this->user, 'admin')
            ->followingRedirects()
            ->get(config('myapp.app_admin_prefix') . '/news/display/2');

        // チェック
        $response->assertOk();
    }
}
