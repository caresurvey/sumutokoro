<?php

namespace Tool\Admin\tests\Feature\Application\Controllers;

use Tool\Admin\tests\TestCase;
use Tool\Admin\tests\RefreshDatabaseLite;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\Admin\tests\TestData;
use App\Models\User;

class UserExportControllerTest extends TestCase
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
    public function export_general_xlsx()
    {
        // アクセス
        $response = $this->actingAs($this->user, 'admin')
            ->get(config('myapp.app_admin_prefix') . '/user/export/xlsx');

        // チェック
        $response->assertOk();
    }
}
