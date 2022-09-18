<?php

namespace Tool\User\Infrastructure\Repositories\Domain\Eloquent;

use Tool\User\Domain\Models\Common\LogicResponse;
use Tool\User\Domain\Models\User\UserRepository;
use Tool\User\Exceptions\UserNotFoundException;
use Tool\User\Infrastructure\Eloquents\EloquentUser;
use Tool\User\Infrastructure\Repositories\Domain\Logic\LogicResponseRepository;
use Tool\User\Exceptions\UserLogicException;
use Tool\Common\Helpers\LogHelper;
use Tool\Common\Infrastructure\Eloquents\EloquentLog;
use DB;

class EloquentUserRepository implements UserRepository
{
    private EloquentLog $eloquentLog;
    private EloquentUser $eloquentUser;
    private LogicResponseRepository $responseRepo;

    public function __construct(
        EloquentLog             $eloquentLog,
        EloquentUser            $eloquentUser,
        LogicResponseRepository $responseRepo
    )
    {
        $this->eloquentLog = $eloquentLog;
        $this->eloquentUser = $eloquentUser;
        $this->responseRepo = $responseRepo;
    }

    public function edit(array $auth): array
    {
        // 必要データの取得
        $data = $this->eloquentUser
            ->where('id', $auth['id'])
            ->where('role_id', 3)
            ->with('spots', 'companies')
            ->first();

        // データがない場合例外を投げる
        if (empty($data)) throw new UserNotFoundException();

        // データがあれば返す
        return $data->toArray();
    }

    public function update(array $request, array $auth): LogicResponse
    {
        // POSTデータを取得
        $post = $request;
        $post['user']['user_id'] = $auth['id'];

        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($post, $auth) {

                // 更新Userデータを取得する
                $data = $this->eloquentUser
                    ->where('id', $post['user']['id'])
                    ->where('role_id', 3)
                    ->first();

                // データがない場合例外を投げる
                if (empty($data)) throw new UserLogicException();

                // Userを更新し、失敗した場合例外を投げる
                if (!$data->fill($post['user'])->save()) throw new UserLogicException();

                // ログの保存
                $log = LogHelper::makeLogData($post, 'user', 'user', 'update', $data->id, $data->name . 'を変更しました', $auth);
                if (!$this->eloquentLog->fill($log)->save()) throw new UserLogicException();

                // レスポンスモデルを作成して返す
                return $this->responseRepo->makeModel(true, '', $data->name . 'を変更しました');
            });
        } catch (UserLogicException $e) {
            // レスポンスモデルを作成して返す
            return $this->responseRepo->makeModel(false, '', '変更できませんでした');
        }
    }
}
