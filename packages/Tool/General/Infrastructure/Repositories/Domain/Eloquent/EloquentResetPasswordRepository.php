<?php

namespace Tool\General\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Support\Facades\Hash;
use Tool\General\Domain\Models\Common\LogicResponse;
use Tool\General\Domain\Models\Common\ResponseRepository;
use Tool\General\Domain\Models\ResetPassword\ResetPasswordRepository;
use Tool\General\Exceptions\GeneralLogicException;
use Tool\General\Exceptions\GeneralNotFoundException;
use Tool\General\Infrastructure\Eloquents\EloquentResetPassword;
use Tool\General\Infrastructure\Eloquents\EloquentUser;
use DB;

class EloquentResetPasswordRepository implements ResetPasswordRepository
{
    private EloquentResetPassword $eloquentResetPassword;
    private EloquentUser $eloquentUser;
    private ResponseRepository $responseRepo;

    public function __construct(
        EloquentResetPassword $eloquentResetPassword,
        EloquentUser          $eloquentUser,
        ResponseRepository    $responseRepo
    )
    {
        // モデル
        $this->eloquentResetPassword = $eloquentResetPassword;
        $this->eloquentUser = $eloquentUser;
        $this->responseRepo = $responseRepo;
    }

    public function store(string $email, string $token): LogicResponse
    {
        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($email, $token) {
                // 書き込み
                if (!$this->eloquentResetPassword->fill(['email' => $email, 'token' => $token])->save()) {
                    // エラーなら例外を投げる
                    throw new GeneralLogicException();
                }
                // レスポンスモデルを作成して返す
                return $this->responseRepo->makeModel(true, 'パスワードリセット申請完了', 'パスワードリセットの申請を完了しました。');
            });
        } catch (GeneralLogicException $e) {
            // エラー書き込み
            Logger($e->getMessage());
            // レスポンスモデルを作成して返す
            return $this->responseRepo->makeModel(false, 'パスワードリセットの申請がきませんでした', 'パスワードリセットの申請ができませんでした');
        }
    }

    public function getUser(string $token): array
    {
        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($token) {

                // リセットデータを取得
                $reset = $this->eloquentResetPassword->where('token', $token)->first();
                
                // データが無ければ例外を投げる
                if (!$reset) throw new GeneralNotFoundException;

                // ユーザーデータを取得
                $user = $this->eloquentUser->where('email', $reset->email)->select('id')->first();

                // データが無ければ例外を投げる
                if (!$user) throw new GeneralNotFoundException;

                // 値を返す
                return $user->toArray();
            });
        } catch (GeneralNotFoundException $e) {
            // エラー書き込み
            Logger($e->getMessage());
            return [];
        }
    }

    public function makeToken(string $email): string
    {
        // データを取得
        $this->eloquentUser->where('email', $email)->first();

        // トークンに変換して返す
        return Hash::make($email . date("Ymd"));
    }
}

