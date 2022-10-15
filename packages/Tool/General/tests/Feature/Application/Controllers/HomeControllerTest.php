<?php

namespace Tool\General\tests\Feature\Application\Controllers;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\General\tests\TestCase;
use Tool\General\tests\RefreshDatabaseLite;

class HomeControllerTest extends TestCase
{
    use RefreshDatabaseLite;
    use WithoutMiddleware;

    /**
     * @test
     */
    public function index()
    {
        // アクセス
        $response = $this->get('/');

        // テストホスト
        $_SERVER['HTTP_HOST'] = 'localhost';

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Home index', $response->content());
    }
}
