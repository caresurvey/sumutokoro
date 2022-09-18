<?php

namespace Tool\User\tests\Feature\Application\Controllers;

use Tool\User\tests\TestCase;
use Tool\User\tests\RefreshDatabaseLite;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\User\tests\TestData;
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
    public function edit()
    {
        // アクセス
        $response = $this->actingAs($this->user, 'user')
            ->followingRedirects()
            ->get('/user/profile');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('User profile', $response->content());
    }

    /**
     * @test
     */
    public function update()
    {
        // アクセスする
        $response = $this->actingAs($this->user, 'user')
            ->put('/user/user/3', $this->testData->requestUserUpdate());

        // チェック
        $this->assertDatabaseHas('users', ['name' => '変更ユーザー']);
        $response->assertStatus(302);
    }
}
