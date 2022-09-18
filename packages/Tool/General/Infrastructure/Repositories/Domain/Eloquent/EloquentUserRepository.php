<?php

namespace Tool\General\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Support\Facades\Hash;
use Tool\General\Domain\Models\Common\LogicResponse;
use Tool\General\Domain\Models\Common\ResponseRepository;
use Tool\General\Exceptions\GeneralLogicException;
use Tool\General\Domain\Models\User\UserRepository;
use Tool\General\Infrastructure\Eloquents\EloquentPasswordUser;
use Tool\General\Infrastructure\Eloquents\EloquentResetPassword;
use DB;

class EloquentUserRepository implements UserRepository
{
    private ResponseRepository $responseRepo;
    private EloquentResetPassword $eloquentResetPassword;
    private EloquentPasswordUser $eloquentPasswordUser;

    public function __construct(
        EloquentResetPassword $eloquentResetPassword,
        EloquentPasswordUser $eloquentPasswordUser,
        ResponseRepository    $responseRepo
    )
    {
        $this->eloquentResetPassword = $eloquentResetPassword;
        $this->eloquentPasswordUser = $eloquentPasswordUser;
        $this->responseRepo = $responseRepo;
    }

    public function changePassword(array $request): LogicResponse
    {
        // POSTデータ　
        $data = $request;

        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($data) {

                // リセットパスワードデータ取得
                $reset_password = $this->eloquentResetPassword->where('token', base64_decode($data['token']))->first();

                // 上記を元にユーザーデータを取得
                $user = $this->eloquentPasswordUser->where('email', $reset_password['email'])->first();

                // 　password書き換え
                if(!$user->fill(['password'=> Hash::make($data['password'])])->save()) {
                    throw new GeneralLogicException();
                }

                // リセットパスワード削除
                if (!$this->eloquentResetPassword->where('token', base64_decode($data['token']))->where('email', $user->email)->delete()) throw new GeneralLogicException();

                // レスポンスモデルを作成して返す
                return $this->responseRepo->makeModel(true, 'パスワード変更完了', 'パスワードを変更しました。');
            });
        } catch (GeneralLogicException $e) {
            // エラー書き込み
            Logger($e->getMessage());
            // レスポンスモデルを作成して返す
            return $this->responseRepo->makeModel(false, 'パスワードを変更できませんでした', 'パスワードを変更できませんでした');
        }
    }
}
