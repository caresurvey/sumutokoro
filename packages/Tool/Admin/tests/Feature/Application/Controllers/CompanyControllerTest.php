<?php

namespace Tool\Admin\tests\Feature\Application\Controllers;

use Tool\Admin\tests\TestCase;
use Tool\Admin\tests\RefreshDatabaseLite;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\Admin\tests\TestData;
use App\Models\User;

class CompanyControllerTest extends TestCase
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
            ->get(config('myapp.app_admin_prefix') . '/company');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Company index', $response->content());
    }

    /**
     * @test
     */
    public function store()
    {
        // POSTデータ用意
        $post['company']['name'] = '追加法人名';
        $post['_method'] = 'POST';

        // POSTする
        $response = $this->actingAs($this->user, 'admin')
            ->followingRedirects()
            ->post(config('myapp.app_admin_prefix') . '/company', $post);

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Company edit', $response->content());
    }

    /**
     * @test
     */
    public function edit()
    {
        // アクセス
        $response = $this->actingAs($this->user, 'admin')
            ->get(config('myapp.app_admin_prefix') . '/company/3/edit');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Company edit', $response->content());
    }

    /**
     * @test
     */
    public function update()
    {
        // アクセスする
        $response = $this->actingAs($this->user, 'admin')
            ->put(config('myapp.app_admin_prefix') . '/company/3', $this->testData->requestCompanyUpdate());

        // チェック
        $this->assertDatabaseHas('companies', ['name' => '変更法人']);
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
            ->delete(config('myapp.app_admin_prefix') . '/company/91');

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
            ->get(config('myapp.app_admin_prefix') . '/company/display/2');

        // チェック
        $response->assertOk();
    }

    /**
     * @test
     */
    public function keyword()
    {
        // アクセスする
        $response = $this->actingAs($this->user, 'admin')
            ->get(config('myapp.app_admin_prefix') . '/company/keyword?keyword=法人');

        // チェック
        $response->assertOk();
        $this->assertIsInt(json_decode($response->content())[0]->id);
        $this->assertIsInt(json_decode($response->content())[1]->id);
    }

    /**
     * @test
     */
    public function keyword_selected()
    {
        // アクセスする
        $response = $this->actingAs($this->user, 'admin')
            ->get(config('myapp.app_admin_prefix') . '/company/keyword_selected?keyword=法人&selected=1|2|3');

        // チェック
        $response->assertOk();
        $this->assertIsInt(json_decode($response->content())[0]->id);
        $this->assertIsInt(json_decode($response->content())[1]->id);
    }
}
