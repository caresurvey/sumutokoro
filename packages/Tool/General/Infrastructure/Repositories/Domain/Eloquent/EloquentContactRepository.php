<?php

namespace Tool\General\Infrastructure\Repositories\Domain\Eloquent;

use Tool\General\Domain\Models\Contact\CheckMode;
use Tool\General\Domain\Models\Contact\ContactRepository;
use Tool\General\Domain\Models\Contact\MailContactForAdmin;
use Tool\General\Domain\Models\Contact\MailContactForCustomer;
use Tool\General\Domain\Models\Contact\SendContact;
use Tool\General\Exceptions\GeneralLogicException;
use Tool\General\Infrastructure\Eloquents\EloquentContact;
use \DB;

class EloquentContactRepository implements ContactRepository
{
    public function store(array $request): bool
    {
        try {
            return DB::transaction(function () use ($request) {

                // POSTデータを取得
                $post = $request;

                // IP設定
                $post['contact']['ip'] = '';
                if(!empty($_SERVER['REMOTE_ADDR'])) $post['contact']['ip'] = $_SERVER['REMOTE_ADDR'];

                // 保存準備
                $data = new EloquentContact();

                // 新規保存
                if (!$data->fill($post['contact'])->save()) {
                    throw new GeneralLogicException('フォームを送信できませんでした');
                }

                // boolを返す
                return true;
            });
        } catch (GeneralLogicException $e) {
            logger($e->getMessage());
            throw new GeneralLogicException('フォームを送信できませんでした');
        }
    }

    /**
     * @param array $data
     * @return MailContactForAdmin
     */
    public function makeMailContactForAdmin(array $data): MailContactForAdmin
    {
        return new MailContactForAdmin($data);
    }

    /**
     * @param array $data
     * @return MailContactForCustomer
     */
    public function makeMailContactForCustomer(array $data): MailContactForCustomer
    {
        return new MailContactForCustomer($data);
    }

    /**
     * @return SendContact
     */
    public function makeSendContact(): SendContact
    {
        return new SendContact();
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
