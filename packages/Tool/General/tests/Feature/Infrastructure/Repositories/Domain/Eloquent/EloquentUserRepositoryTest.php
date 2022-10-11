<?php

namespace Tool\General\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\General\Domain\Models\User\CheckMode;
use Tool\General\Domain\Models\ResetPassword\ResetPasswordRepository;
use Tool\General\Domain\Models\User\MailRegisterForAdmin;
use Tool\General\Domain\Models\User\MailRegisterForCustomer;
use Tool\General\Domain\Models\User\SendRegister;
use Tool\General\Domain\Models\User\UserRepository;
use Tool\General\tests\TestCase;
use Tool\General\Domain\Models\Common\LogicResponse;
use Tool\General\Infrastructure\Eloquents\EloquentResetPassword;
use Tool\General\Infrastructure\Eloquents\EloquentUser;
use Tool\General\tests\RefreshDatabaseLite;

class EloquentUserRepositoryTest extends TestCase
{
    private array $auth;
    private EloquentResetPassword $eloquentResetPassword;
    private EloquentUser $eloquentUser;
    private ResetPasswordRepository $resetPasswordRepo;
    private userRepository $userRepo;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->userRepo = app()->make(UserRepository::class);
        $this->resetPasswordRepo = app()->make(ResetPasswordRepository::class);
        $this->eloquentResetPassword = app()->make(EloquentResetPassword::class);
        $this->eloquentUser = app()->make(EloquentUser::class);
    }

    /**
     * @test
     */
    public function changePassword_正常系()
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

        // テスト対象メソッドを実行
        $result = $this->userRepo->changePassword($post);

        // 検証
        $this->assertTrue($result->getResult());
    }
}