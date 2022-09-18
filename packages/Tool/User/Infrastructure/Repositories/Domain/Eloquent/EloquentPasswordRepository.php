<?php

namespace Tool\User\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Support\Facades\Hash;
use Tool\User\Domain\Models\Common\LogicResponse;
use Tool\User\Domain\Models\Password\PasswordRepository;
use Tool\User\Infrastructure\Eloquents\EloquentPassword;
use Tool\User\Infrastructure\Repositories\Domain\Logic\LogicResponseRepository;
use Tool\User\Exceptions\UserLogicException;
use Tool\Common\Helpers\LogHelper;
use Tool\Common\Infrastructure\Eloquents\EloquentLog;
use DB;

class EloquentPasswordRepository implements PasswordRepository
{
    private EloquentLog $eloquentLog;
    private EloquentPassword $eloquentPassword;
    private LogicResponseRepository $responseRepo;

    public function __construct(
        EloquentLog             $eloquentLog,
        EloquentPassword        $eloquentPassword,
        LogicResponseRepository $responseRepo
    )
    {
        $this->eloquentLog = $eloquentLog;
        $this->eloquentPassword = $eloquentPassword;
        $this->responseRepo = $responseRepo;
    }

    public function update(array $request, array $auth): LogicResponse
    {
        // 本人確認処理

        // POSTデータを取得
        $post = $request;
        $post['user']['user_id'] = $auth['id'];
        $post['user']['password'] = Hash::make($post['user']['password']);

        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($post, $auth) {

                // Userデータ更新
                $data = $this->eloquentPassword->where('id', $auth['id'])->first();

                // Userを更新し、失敗した場合例外を投げる
                if (!$data->fill($post['user'])->save()) throw new UserLogicException();

                // ログの保存
                $log = LogHelper::makeLogData($post, 'user', 'password', 'update', $data->id, 'パスワードを変更しました', $auth);
                if (!$this->eloquentLog->fill($log)->save()) throw new UserLogicException();

                // レスポンスモデルを作成して返す
                return $this->responseRepo->makeModel(true, '', 'パスワードを変更しました');
            });
        } catch (UserLogicException $e) {
            // レスポンスモデルを作成して返す
            return $this->responseRepo->makeModel(false, '', 'パスワード変更できませんでした');
        }
    }
}
