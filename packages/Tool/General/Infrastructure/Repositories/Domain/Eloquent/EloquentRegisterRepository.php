<?php

namespace Tool\General\Infrastructure\Repositories\Domain\Eloquent;

use Tool\General\Domain\Models\Register\CheckMode;
use Tool\General\Domain\Models\Register\Register;
use Tool\General\Domain\Models\Register\SendGridRegister;
use Tool\General\Exceptions\GeneralLogicException;
use Tool\General\Domain\Models\Register\RegisterRepository;
use Tool\General\Infrastructure\Eloquents\EloquentUserRegister;
use DB;

class EloquentRegisterRepository implements RegisterRepository
{
    public function store(array $request): bool
    {
        // POSTデータを取得
        $post = $request;

        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($post) {

                // Userデータ更新
                $user = new EloquentUserRegister();

                // Userを更新し、失敗した場合例外を投げる
                if (!$user->fill($post['user'])->save()) throw new GeneralLogicException();

                return true;
            });
        } catch (GeneralLogicException $e) {
            // エラー書き込み
            Logger($e->getMessage());
            return false;
        }
    }

    /**
     * @param array $data
     * @param bool $isAdmin
     * @return Register
     */
    public function makeRegister(array $data, bool $isAdmin): Register
    {
        return new Register($data, $isAdmin);
    }

    /**
     * @param Register $register
     * @return SendGridRegister
     */
    public function makeSendGridRegister(Register $register): SendGridRegister
    {
        return new SendGridRegister($register);
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
