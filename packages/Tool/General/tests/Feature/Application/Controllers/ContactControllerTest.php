<?php

namespace Tool\General\tests\Feature\Application\Controllers;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\General\tests\TestCase;
use Tool\General\tests\RefreshDatabaseLite;

class ContactControllerTest extends TestCase
{
    use RefreshDatabaseLite;
    use WithoutMiddleware;

    /**
     * @test
     */
    public function index()
    {
        // アクセス
        $response = $this->get('/contact');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Contact input', $response->content());
    }

    /**
     * @test
     */
    public function send()
    {
        $post['contact'] = [
            'name' => '質問太郎',
            'kana' => 'しつもんたろう',
            'email' => 'contact@hoge.co.jp',
            'tel' => '012-345-6789',
            'reply' => 'メールでのご返答',
            'msg' => 'お問い合わせ内容',
            'privacy' => '1',
        ];
        // アクセス
        $response = $this->post('/contact', $post);

        // チェック
        $this->assertDatabaseHas('contacts', ['name' => '質問太郎']);
        $response->assertStatus(302);
    }
}
