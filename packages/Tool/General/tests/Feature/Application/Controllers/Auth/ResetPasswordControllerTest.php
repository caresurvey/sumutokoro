<?php

namespace Tool\General\tests\Feature\Application\Controllers\Auth;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\General\Domain\Models\ResetPassword\ResetPasswordRepository;
use Tool\General\Infrastructure\Eloquents\EloquentResetPassword;
use Tool\General\Infrastructure\Eloquents\EloquentUser;
use Tool\General\tests\TestCase;
use Tool\General\tests\RefreshDatabaseLite;

class ResetPasswordControllerTest extends TestCase
{
    private EloquentResetPassword $eloquentResetPassword;
    private EloquentUser $eloquentUser;
    private ResetPasswordRepository $resetPasswordRepo;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->resetPasswordRepo = app()->make(ResetPasswordRepository::class);
        $this->eloquentResetPassword = app()->make(EloquentResetPassword::class);
        $this->eloquentUser = app()->make(EloquentUser::class);
    }

    /**
     * @test
     */
    public function index()
    {
        // テストデータセット
        $email = 'user@hoge.co.jp';
        $token = $this->resetPasswordRepo->makeToken($email);
        $this->eloquentResetPassword->email = $email;
        $this->eloquentResetPassword->token = $token;
        $this->eloquentResetPassword->save();
        $resetPassword = $this->eloquentResetPassword->orderBy('created_at', 'desc')->first();
        $post = $resetPassword->toArray();
        $post['password'] = 'new_password';
        $post['token'] = base64_encode($post['token']);

        // アクセス
        $response = $this->get('/password/reset/' . $post['token']);

        // チェック
        $response->assertOk();
        $this->assertStringContainsString('ResetPassword showResetForm', $response->content());
    }

    /**
     * @test
     */
    public function send()
    {
        // テストデータセット
        $email = 'user@hoge.co.jp';
        $token = $this->resetPasswordRepo->makeToken($email);
        $this->eloquentResetPassword->email = $email;
        $this->eloquentResetPassword->token = $token;
        $this->eloquentResetPassword->save();
        $resetPassword = $this->eloquentResetPassword->orderBy('created_at', 'desc')->first();
        $user = $this->eloquentUser->where('email', $email)->select('id')->first();
        $post = $resetPassword->toArray();
        $post['password'] = 'new_password';
        $post['password_confirm'] = 'new_password';
        $post['token'] = base64_encode($post['token']);
        $post['id'] = $user['id'];

        // アクセス
        $response = $this->post('/password/reset/' , $post);

        // チェック
        $this->assertDatabaseMissing('reset_passwords', ['email' => 'user2@hoge.co.jp']);
        $response->assertStatus(302);
    }
}
