<?php

namespace Tool\Admin\tests\Feature\Application\Controllers;

use Tool\Admin\tests\TestCase;
use Tool\Admin\tests\RefreshDatabaseLite;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\Admin\tests\TestData;
use App\Models\User;

class SpotControllerTest extends TestCase
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
            ->get(config('myapp.app_admin_prefix') . '/spot');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Spot index', $response->content());
    }

    /**
     * @test
     */
    public function store()
    {
        // POSTデータ用意
        $post['spot']['name'] = '追加事業所名';
        $post['_method'] = 'POST';

        // POSTする
        $response = $this->actingAs($this->user, 'admin')
            ->followingRedirects()
            ->post(config('myapp.app_admin_prefix') . '/spot', $post);

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Spot edit', $response->content());
    }

    /**
     * @test
     */
    public function edit()
    {
        // アクセス
        $response = $this->actingAs($this->user, 'admin')
            ->followingRedirects()
            ->get(config('myapp.app_admin_prefix') . '/spot/3/edit');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Spot edit', $response->content());
    }

    /**
     * @test
     */
    public function update()
    {
        // アクセスする
        $response = $this->actingAs($this->user, 'admin')
            ->put(config('myapp.app_admin_prefix') . '/spot/3', $this->testData->requestSpotUpdate());

        // チェック
        $this->assertDatabaseHas('spots', ['name' => '変更事業所']);
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
            ->delete(config('myapp.app_admin_prefix') . '/spot/3');

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
            ->get(config('myapp.app_admin_prefix') . '/spot/display/2');

        // チェック
        $response->assertOk();
    }

    /**
     * @test
     */
    public function keyword_selected()
    {
        // アクセスする
        $response = $this->actingAs($this->user, 'admin')
            ->get(config('myapp.app_admin_prefix') . '/spot/keyword_selected?keyword=事業所&selected=1|2|3');

        // チェック
        $response->assertOk();
        $this->assertSame(4, json_decode($response->content())[0]->id);
        $this->assertSame(5, json_decode($response->content())[1]->id);
    }
}
