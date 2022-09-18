<?php

namespace Tool\User\tests\Feature\Application\Controllers;

use Tool\User\tests\TestCase;
use Tool\User\tests\RefreshDatabaseLite;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\User\tests\TestData;
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
        $response = $this->actingAs($this->user, 'user')
            ->get('/user/spot');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Spot index', $response->content());
    }

    /**
     * @test
     */
    public function edit()
    {
        // テスト用にユーザーID指定
        $this->user['id'] = 3;

        // アクセス
        $response = $this->actingAs($this->user, 'user')
            ->get('/user/spot/3/edit');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Spot edit', $response->content());
    }

    /**
     * @test
     */
    public function update()
    {
        // テスト用にユーザーID指定
        $this->user['id'] = 3;

        // アクセスする
        $response = $this->actingAs($this->user, 'user')
            ->put('/user/spot/3', $this->testData->requestSpotUpdate());

        // チェック
        $this->assertDatabaseHas('spots', ['name' => '変更事業所']);
        $response->assertStatus(302);
    }

    /**
     * @test
     */
    public function display()
    {
        // テスト用にユーザーID指定
        $this->user['id'] = 3;

        // アクセスする
        $response = $this->actingAs($this->user, 'user')
            ->followingRedirects()
            ->get('/user/spot/display/3');

        // チェック
        $response->assertOk();
    }
}
