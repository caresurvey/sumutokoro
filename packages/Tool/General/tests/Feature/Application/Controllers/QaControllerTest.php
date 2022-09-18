<?php

namespace Tool\General\tests\Feature\Application\Controllers;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\General\tests\TestCase;
use Tool\General\tests\RefreshDatabaseLite;

class QaControllerTest extends TestCase
{
    use RefreshDatabaseLite;
    use WithoutMiddleware;

    /**
     * @test
     */
    public function index()
    {
        // アクセス
        $response = $this->get('/qa');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Qa index', $response->content());
    }

    /**
     * @test
     */
    public function detail()
    {
        // アクセス
        $response = $this->get('/qa/1');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Qa detail', $response->content());
    }
}
