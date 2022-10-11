<?php

namespace Tool\User\tests\Feature\Application\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\User\tests\TestCase;
use Tool\User\tests\RefreshDatabaseLite;
use Tool\User\tests\TestData;

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
        $response = $this->actingAs($this->user, 'user')
            ->get('/user/company');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Company index', $response->content());
    }

    /**
     * @test
     */
    public function edit()
    {
        // テスト用にユーザーID指定
        $this->user['id'] = 2;

        // アクセス
        $response = $this->actingAs($this->user, 'user')
            ->get('/user/company/2/edit');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Company edit', $response->content());
    }

    /**
     * @test
     */
    public function update()
    {
        // テスト用にユーザーID指定
        $this->user['id'] = 2;

        // アクセスする
        $response = $this->actingAs($this->user, 'user')
            ->put('/user/company/2', $this->testData->requestCompanyUpdate());

        // チェック
        $this->assertDatabaseHas('companies', ['name' => '変更法人']);
        $response->assertStatus(302);
    }

    /**
     * @test
     */
    public function display()
    {
        // テスト用にユーザーID指定
        $this->user['id'] = 2;

        // アクセスする
        $response = $this->actingAs($this->user, 'user')
            ->followingRedirects()
            ->get('/user/company/display/2');

        // チェック
        $response->assertOk();
    }
}
