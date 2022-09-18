<?php

namespace Tool\General\tests\Feature\Application\Controllers\Auth;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\General\tests\TestCase;
use Tool\General\tests\RefreshDatabaseLite;

class ForgetPasswordControllerTest extends TestCase
{
    use RefreshDatabaseLite;
    use WithoutMiddleware;

    /**
     * @test
     */
    public function index()
    {
        // アクセス
        $response = $this->get('/password/email');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('ForgotPassword showLinkRequestForm', $response->content());
    }

    /**
     * @test
     */
    public function send()
    {
        $post['email'] = 'user@hoge.co.jp';

        // アクセス
        $response = $this->post('/password/email', $post);

        // チェック
        $this->assertDatabaseHas('reset_passwords', ['email' => $post['email']]);
        $response->assertStatus(302);
    }
}
