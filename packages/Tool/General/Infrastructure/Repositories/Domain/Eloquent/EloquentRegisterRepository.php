<?php

namespace Tool\General\Infrastructure\Repositories\Domain\Eloquent;

use Tool\General\Domain\Models\Register\CheckMode;
use Tool\General\Domain\Models\Register\MailRegisterForAdmin;
use Tool\General\Domain\Models\Register\MailRegisterForCustomer;
use Tool\General\Domain\Models\Register\SendRegister;
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

    public function makeMailRegisterForAdmin(array $data): MailRegisterForAdmin
    {
        return new MailRegisterForAdmin($data);
    }

    public function makeMailRegisterForCustomer(array $data): MailRegisterForCustomer
    {
        return new MailRegisterForCustomer($data);
    }

    public function makeSendRegister(): SendRegister
    {
        return new SendRegister();
    }

    public function makeCheckMode(array $request): CheckMode
    {
        return new CheckMode($request);
    }
}
