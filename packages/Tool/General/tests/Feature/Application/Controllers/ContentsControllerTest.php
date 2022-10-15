<?php

namespace Tool\General\tests\Feature\Application\Controllers;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\General\tests\TestCase;
use Tool\General\tests\RefreshDatabaseLite;

class ContentsControllerTest extends TestCase
{
    use RefreshDatabaseLite;
    use WithoutMiddleware;

    /**
     * @test
     */
    public function service()
    {
        // アクセス
        $response = $this->get('/service');

        // テストホスト
        $_SERVER['HTTP_HOST'] = 'localhost';

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Contents service', $response->content());
    }

    /**
     * @test
     */
    public function company()
    {
        // アクセス
        $response = $this->get('/company');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Contents company', $response->content());
    }

    /**
     * @test
     */
    public function sitemap()
    {
        // アクセス
        $response = $this->get('/sitemap');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Contents sitemap', $response->content());
    }

    /**
     * @test
     */
    public function privacy()
    {
        // アクセス
        $response = $this->get('/privacy');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Contents privacy', $response->content());
    }
}
