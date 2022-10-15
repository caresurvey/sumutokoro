<?php

namespace Tool\General\tests\Feature\Application\Controllers\Auth;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\General\tests\TestCase;
use Tool\General\tests\RefreshDatabaseLite;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabaseLite;
    use WithoutMiddleware;

    /**
     * @test
     */
    public function index()
    {
        // テストホスト
        $_SERVER['HTTP_HOST'] = 'localhost';

        // アクセス
        $response = $this->get('/register');

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('Register index', $response->content());
    }

    /**
     * @test
     */
    public function send()
    {
        // テストホスト
        $_SERVER['HTTP_HOST'] = 'localhost';

        // テストデータ
        $post['user'] = [
            'name' => '登録太郎',
            'kana' => 'とうろくたろう',
            'zip1' => '',
            'zip2' => '',
            'address' => '',
            'tel1' => '011',
            'tel2' => '123',
            'tel3' => '4567',
            'fax' => '',
            'lat' => config('myapp.default_lat'),
            'lng' => config('myapp.default_lng'),
            'email' => 'register@hoge.co.jp',
            'password' => 'password',
            'password_confirm' => 'password',
            'city_id' => '2',
            'authenticated_msg' => '',
            'prefecture_id' => '2',
            'user_type_id' => '2',
            'job_type_id' => '2',
            'role_id' => '3',
            'trade_area_id' => '2',
            'company' => '所属事業所',
            'msg' => '備考',
            'privacy' => '1'
        ];

        // アクセス
        $response = $this->post('/register', $post);

        // チェック
        $this->assertDatabaseHas('users', ['name' => $post['user']['name']]);
        $response->assertStatus(302);
    }
}
