<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Eloquent;

use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\News\NewsRepository;
use Tool\Admin\Infrastructure\Eloquents\EloquentNews;
use Tool\Admin\Exceptions\AdminNotFoundException;
use Tool\Admin\Exceptions\AdminLogicException;
use Tool\Admin\Infrastructure\Repositories\Domain\Logic\LogicResponseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Tool\Common\Helpers\LogHelper;
use Tool\Common\Infrastructure\Eloquents\EloquentLog;
use DB;

class EloquentNewsRepository implements NewsRepository
{
    private EloquentLog $eloquentLog;
    private EloquentNews $eloquentNews;
    private LogicResponseRepository $responseRepo;
    private int $limit = 30;

    public function __construct(
        EloquentLog                     $eloquentLog,
        EloquentNews            $eloquentNews,
        LogicResponseRepository $responseRepo
    )
    {
        $this->eloquentLog = $eloquentLog;
        $this->eloquentNews = $eloquentNews;
        $this->responseRepo = $responseRepo;
    }

    public function list(): array
    {
        // ページネートオブジェクトを作成
        $query = $this->eloquentNews::query();

        // ソート機能追加
        $query->sortable();

        // ベースの並び
        $query->orderBy('created_at', 'DESC');
        $query->orderBy('id', 'DESC');

        // リレーション
        $query->with('user');

        // 現在のページを取得
        $current = Paginator::resolveCurrentPage();

        // 取得開始の件数を割り出す
        $skip = ($this->limit * $current) - $this->limit;

        // 検索結果の件数を取得
        $totalCount = $query->count();

        // 1ページ分のデータを取得
        $list = $query->skip($skip)->take($this->limit)->get();

        // ページネートを生成
        $data = new LengthAwarePaginator($list, $totalCount, $this->limit, $current, array('path' => config('myapp.app_path') . '/' . config('myapp.app_admin_prefix') . '/news/'));

        // データを返す
        return [
            'news' => $data->items(),
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
        $post['news']['user_id'] = $auth['id'];

        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($post, $auth) {

                // Newsデータ更新
                $news = new EloquentNews();

                // Newsを更新し、失敗した場合例外を投げる
                if (!$news->fill($post['news'])->save()) throw new AdminLogicException();

                // ログの保存
                $log = LogHelper::makeLogData($post, 'admin', 'news', 'store', $news->id, $news->name . 'を登録しました', $auth);
                if (!$this->eloquentLog->fill($log)->save()) throw new AdminLogicException();

                // レスポンスモデルを作成して返す
                return $this->responseRepo->makeModel(true, '', $news->name . 'を登録しました。さらに詳しい情報を入力しましょう。', ['id' => $news->id, 'name' => $news->name, 'backlink' => 'news/' . $news->id . '/edit/']);
            });
        } catch (AdminLogicException $e) {
            // レスポンスモデルを作成して返す
            return $this->responseRepo->makeModel(false, '', '登録できませんでした', ['backlink' => 'news']);
        }
    }

    public function edit(int $id, array $auth): array
    {
        // 必要データの取得
        $data = $this->eloquentNews
            ->where('id', $id)
            ->with(
                'user'
            )
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
        $post['news']['user_id'] = $auth['id'];

        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($post, $auth) {

                // Newsデータ更新
                $data = $this->eloquentNews->where('id', $post['news']['id'])->first();

                // Newsを更新し、失敗した場合例外を投げる
                if (!$data->fill($post['news'])->save()) throw new AdminLogicException();

                // ログの保存
                $log = LogHelper::makeLogData($post, 'admin', 'news', 'update', $data->id, $data->name . 'を変更しました', $auth);
                if (!$this->eloquentLog->fill($log)->save()) throw new AdminLogicException();

                // レスポンスモデルを作成して返す
                return $this->responseRepo->makeModel(true, '', $data->name . 'を変更しました');
            });
        } catch (AdminLogicException $e) {
            // レスポンスモデルを作成して返す
            return $this->responseRepo->makeModel(false, '', '変更できませんでした');
        }
    }

    public function display(int $id, array $auth): LogicResponse
    {
        // 削除するデータを取得
        $data = $this->eloquentNews->where('id', $id)->first();

        // 切り替え
        if ($data->display === 0) {
            $data->display = 1;
            $message = $data->name . 'を表示にしました';
        } else {
            $data->display = 0;
            $message = $data->name . 'を非表示にしました';
        }

        // ログの保存
        $log = LogHelper::makeLogData($data->toArray(), 'admin', 'news', 'display', $data->id, $message, $auth);
        if (!$this->eloquentLog->fill($log)->save()) throw new AdminLogicException();

        // ユーザー書き換え
        $data->user_id = $auth['id'];

        // データを保存
        $data->save();

        // レスポンスモデルを作成して返す
        return $this->responseRepo->makeModel(true, '', $message);
    }

    public function remove(int $id, $auth): LogicResponse
    {
        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($id, $auth) {
                // データ取得
                $data = $this->eloquentNews->where('id', $id)->first();

                // 削除するデータを取得して削除し、結果を返す
                if (!$data->delete()) throw new AdminLogicException();

                // ログの保存
                $log = LogHelper::makeLogData($data->toArray(), 'admin', 'news', 'remove', $data->id, $data->name . 'を削除しました', $auth);
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
        return $this->eloquentNews->count();
    }
}
