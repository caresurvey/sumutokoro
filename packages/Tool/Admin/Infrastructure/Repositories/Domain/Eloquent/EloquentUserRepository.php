<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Eloquent;

use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\User\Export;
use Tool\Admin\Domain\Models\User\UserRepository;
use Tool\Admin\Exceptions\AdminNotFoundException;
use Tool\Admin\Infrastructure\Eloquents\EloquentUser;
use Tool\Admin\Infrastructure\Eloquents\EloquentUserRegister;
use Tool\Admin\Infrastructure\Repositories\Domain\Logic\LogicResponseRepository;
use Tool\Admin\Exceptions\AdminLogicException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Tool\Common\Helpers\LogHelper;
use Tool\Common\Infrastructure\Eloquents\EloquentLog;
use DB;

class EloquentUserRepository implements UserRepository
{
    private EloquentLog $eloquentLog;
    private EloquentUser $eloquentUser;
    private LogicResponseRepository $responseRepo;
    private int $limit = 30;

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

    public function list(): array
    {
        // ページネートオブジェクトを作成
        $query = $this->eloquentUser::query();

        // ソート機能追加
        $query->sortable();

        // ベースの並び
        $query->orderBy('id', 'DESC');
        //$query->orderBy('role_id', 'ASC');

        // リレーション
        $query->with('role', 'user');

        // 現在のページを取得
        $current = Paginator::resolveCurrentPage();

        // 取得開始の件数を割り出す
        $skip = ($this->limit * $current) - $this->limit;

        // 検索結果の件数を取得
        $totalCount = $query->count();

        // 1ページ分のデータを取得
        $list = $query->skip($skip)->take($this->limit)->get();

        // ページネートを生成
        $data = new LengthAwarePaginator($list, $totalCount, $this->limit, $current, array('path' => config('myapp.app_path') . '/' . config('myapp.app_admin_prefix') . '/user/'));

        // データを返す
        return [
            'users' => $data->items(),
            'current' => $current,
            'totalCount' => $totalCount,
            'fullPage' => (int)ceil($totalCount / $this->limit),
            'limit' => $this->limit,
            'linkTag' => $data->links('vendor.pagination.default')->toHtml()
        ];
    }

    public function store(array $request, array $auth): LogicResponse
    {
        // POSTデータを取得
        $post = $request;
        $post['user']['user_id'] = $auth['id'];

        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($post, $auth) {

                // Userデータ更新
                $user = new EloquentUserRegister();

                // Userを更新し、失敗した場合例外を投げる
                if (!$user->fill($post['user'])->save()) throw new AdminLogicException();

                // ログの保存
                $log = LogHelper::makeLogData($post, 'admin', 'user', 'store', $user->id, $user->name . 'を登録しました', $auth);
                if (!$this->eloquentLog->fill($log)->save()) throw new AdminLogicException();

                // レスポンスモデルを作成して返す
                return $this->responseRepo->makeModel(true, '', $user->name . 'を登録しました。さらに詳しい情報を入力しましょう。', ['id' => $user->id, 'name' => $user->name, 'backlink' => 'user/' . $user->id . '/edit/']);
            });
        } catch (AdminLogicException $e) {
            // レスポンスモデルを作成して返す
            return $this->responseRepo->makeModel(false, '', '登録できませんでした', ['backlink' => 'user']);
        }
    }

    public function edit(int $id, array $auth): array
    {
        // 必要データの取得
        $data = $this->eloquentUser
            ->where('id', $id)
            ->with('companies', 'spots', 'user')
            ->first();

        // データがない場合
        if (empty($data)) throw new AdminNotFoundException();

        // データがあれば返す
        return $data->toArray();
    }

    public function update(array $request, array $auth): LogicResponse
    {
        // POSTデータを取得
        $post = $request;
        $post['user']['user_id'] = $auth['id'];
        if (empty($post['user']['spots'])) $post['user']['spots'] = [];
        if (empty($post['user']['companies'])) $post['user']['companies'] = [];

        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($post, $auth) {

                // Userデータ更新
                $data = $this->eloquentUser->where('id', $post['user']['id'])->first();

                // 承認日時の書き込み
                if(empty($data->authenticated_date) && $post['user']['is_authenticated'] === '1') {
                    $post['user']['authenticated_date'] = date("Y-m-d H:i:s");
                }

                // Userを更新し、失敗した場合例外を投げる
                if (!$data->fill($post['user'])->save()) throw new AdminLogicException();

                // spotsを反映
                $data->spots()->sync($post['user']['spots']);

                // companiesを反映
                $data->companies()->sync($post['user']['companies']);

                // ログの保存
                $log = LogHelper::makeLogData($post, 'admin', 'company', 'update', $data->id, $data->name . 'を変更しました', $auth);
                if (!$this->eloquentLog->fill($log)->save()) throw new AdminLogicException();

                // レスポンスモデルを作成して返す
                return $this->responseRepo->makeModel(true, '', $data->name . 'を変更しました');
            });
        } catch (AdminLogicException $e) {
            // レスポンスモデルを作成して返す
            return $this->responseRepo->makeModel(false, '', '変更できませんでした');
        }
    }

    public function enabled(int $id, array $auth): LogicResponse
    {
        // 削除するデータを取得
        $data = $this->eloquentUser->where('id', $id)->first();

        // 切り替え
        if ($data->enabled === 0) {
            $data->enabled = 1;
            $message = $data->name . 'を表示にしました';
        } else {
            $data->enabled = 0;
            $message = $data->name . 'を非表示にしました';
        }

        // ログの保存
        $log = LogHelper::makeLogData($data->toArray(), 'admin', 'user', 'enabled', $data->id, $message, $auth);
        if (!$this->eloquentLog->fill($log)->save()) throw new AdminLogicException();

        // ユーザー書き換え
        $data->user_id = $auth['id'];

        // データを保存
        $data->save();

        // レスポンスモデルを作成して返す
        return $this->responseRepo->makeModel(true, '', $message);
    }

    public function remove(int $id, array $auth): LogicResponse
    {
        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($id, $auth) {
                // データ取得
                $data = $this->eloquentUser->where('id', $id)->first();

                // 削除するデータを取得して削除し、結果を返す
                if (!$data->delete()) throw new AdminLogicException();

                // ログの保存
                $log = LogHelper::makeLogData($data->toArray(), 'admin', 'user', 'remove', $data->id, $data->name . 'を削除しました', $auth);
                if (!$this->eloquentLog->fill($log)->save()) throw new AdminLogicException();

                // レスポンスモデルを作成して返す
                return $this->responseRepo->makeModel(true, '', $data->name . 'を削除しました');
            });
        } catch (AdminLogicException $e) {
            // レスポンスモデルを作成して返す
            return $this->responseRepo->makeModel(false, '', '削除できませんでした');
        }
    }

    public function count(): int
    {
        return $this->eloquentUser->count();
    }

    public function export(): Export
    {
        $data = $this->eloquentUser
            ->with('job_type', 'role', 'user_type')
            ->get();
        return new Export($data);
    }
}
