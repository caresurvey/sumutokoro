<?php

namespace Tool\General\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Support\Facades\Hash;
use Tool\General\Domain\Models\ForgotPassword\CheckMode;
use Tool\General\Domain\Models\ForgotPassword\ForgotPassword;
use Tool\General\Domain\Models\ForgotPassword\ForgotPasswordRepository;
use Tool\General\Domain\Models\ForgotPassword\SendGridForgotPassword;
use Tool\General\Exceptions\GeneralLogicException;
use Tool\General\Infrastructure\Eloquents\EloquentResetPassword;
use Tool\General\Infrastructure\Eloquents\EloquentUser;
use DB;

class EloquentForgotPasswordRepository implements ForgotPasswordRepository
{
    private EloquentResetPassword $eloquentResetPassword;
    private EloquentUser $eloquentUser;

    public function __construct(
        EloquentResetPassword $eloquentResetPassword,
        EloquentUser          $eloquentUser
    )
    {
        // モデル
        $this->eloquentResetPassword = $eloquentResetPassword;
        $this->eloquentUser = $eloquentUser;
    }

    public function makeToken(string $email): string
    {
        // データを取得
        $this->eloquentUser->where('email', $email)->first();

        // トークンに変換して返す
        return Hash::make($email . date("Ymd"));
    }

    public function store(string $email, string $token): bool
    {
        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($email, $token) {
                // 書き込み
                if (!$this->eloquentResetPassword->fill(['email' => $email, 'token' => $token])->save()) {
                    // エラーなら例外を投げる
                    throw new GeneralLogicException();
                }
                return true;
            });
        } catch (GeneralLogicException $e) {
            // エラー書き込み
            Logger($e->getMessage());
            return false;
        }
    }



    /**
     * @return ForgotPassword
     */
    public function makeForgotPassword(string $email, string $token): ForgotPassword
    {
        return new ForgotPassword($email, $token);
    }

    /**
     * @return SendGridForgotPassword
     */
    public function makeSendGridForgotPassword(ForgotPassword $forgotPassword): SendGridForgotPassword
    {
        return new SendGridForgotPassword($forgotPassword);
    }

    /**
     * @param array $request
     * @return CheckMode
     */
    public function makeCheckMode(array $request): CheckMode
    {
        return new CheckMode($request);
    }
}

