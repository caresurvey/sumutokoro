<?php

namespace Tool\General\tests\Feature\Application\Controllers;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\General\tests\TestCase;
use Tool\General\tests\RefreshDatabaseLite;

class SpotControllerTest extends TestCase
{
    use RefreshDatabaseLite;
    use WithoutMiddleware;

    /**
     * @test
     */
    public function index()
    {
        // アクセス
        $response = $this->get('/spot');

        // テストホスト
        $_SERVER['HTTP_HOST'] = 'localhost';

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Spot index', $response->content());
    }

    /**
     * @test
     */
    public function detail()
    {
        // アクセス
        $response = $this->get('/spot/1');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Spot detail', $response->content());
    }
}
