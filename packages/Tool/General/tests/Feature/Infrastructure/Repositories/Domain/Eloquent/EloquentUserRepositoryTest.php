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
    public function store_正常系()
    {
        // 実行前のレコード数
        $beforeCount = $this->eloquentUser->count();

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
            'email' => 'register' . rand(10,99) . '@hoge.co.jp',
            'password' => 'password',
            'city_id' => '2',
            'authenticated_msg' => '',
            'prefecture_id' => '2',
            'user_type_id' => '2',
            'job_type_id' => '2',
            'role_id' => '3',
            'trade_area_id' => '2',
            'company' => '所属事業所',
            'msg' => '備考'
        ];

        // テスト対象メソッドを実行
        $result = $this->userRepo->store($post);

        // 変更されたデータを検証用に取得
        $check = $this->eloquentUser->orderBy('created_at', 'desc')->first();

        // 実行後のレコード数
        $afterCount = $this->eloquentUser->count();

        // 検証
        $this->assertInstanceOf(LogicResponse::class, $result);
        $this->assertTrue($result->getResult());
        $this->assertSame('登録太郎', $check->name);

        // 処理後のレコード数をチェック
        $this->assertSame($beforeCount + 1, $afterCount); // レコード数が増えたかチェック
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

    /**
     * @test
     */
    public function makeMailRegisterForAdmin_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->userRepo->makeMailRegisterForAdmin([]);

        // 検証
        $this->assertInstanceOf(MailRegisterForAdmin::class, $result);
    }

    /**
     * @test
     */
    public function makeMailRegisterForCustomer_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->userRepo->makeMailRegisterForCustomer([]);

        // 検証
        $this->assertInstanceOf(MailRegisterForCustomer::class, $result);
    }

    /**
     * @test
     */
    public function makeSendRegister_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->userRepo->makeSendRegister();

        // 検証
        $this->assertInstanceOf(SendRegister::class, $result);
    }

    /**
     * @test
     */
    public function makeCheckMode_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->userRepo->makeCheckMode([]);

        // 検証
        $this->assertInstanceOf(CheckMode::class, $result);
    }
}