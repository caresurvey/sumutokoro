<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Tool\Admin\Domain\Models\Log\LogRepository;
use Tool\Admin\Exceptions\AdminNotFoundException;
use Tool\Admin\Infrastructure\Eloquents\EloquentLog;
use DB;

class EloquentLogRepository implements LogRepository
{
    private EloquentLog $eloquentLog;
    private int $limit = 30;

    public function __construct(
        EloquentLog $eloquentLog,
    )
    {
        $this->eloquentLog = $eloquentLog;
    }

    public function list(): array
    {
        // ページネートオブジェクトを作成
        $query = $this->eloquentLog::query();

        // ソート機能追加
        $query->sortable();

        // ベースの並び
        $query->orderBy('created_at', 'DESC');
        $query->orderBy('id', 'DESC');

        // 現在のページを取得
        $current = Paginator::resolveCurrentPage();

        // 取得開始の件数を割り出す
        $skip = ($this->limit * $current) - $this->limit;

        // 検索結果の件数を取得
        $totalCount = $query->count();

        // 1ページ分のデータを取得
        $list = $query->skip($skip)->take($this->limit)->get();

        // ページネートを生成
        $data = new LengthAwarePaginator($list, $totalCount, $this->limit, $current, array('path' => config('myapp.app_path') . '/' . config('myapp.app_admin_prefix') . '/log/'));

        // データを返す
        return [
            'logs' => $data->items(),
            'current' => $current,
            'totalCount' => $totalCount,
            'fullPage' => (int)ceil($totalCount / $this->limit),
            'limit' => $this->limit,
            'linkTag' => $data->links('vendor.pagination.default')->toHtml()
        ];
    }

    public function show(int $id): array
    {
        // 必要データの取得
        $data = $this->eloquentLog->where('id', $id)->first();

        // データがない場合
        if (empty($data)) throw new AdminNotFoundException();

        // データがあれば返す
        return $data->toArray();
    }

    public function count(): int
    {
        return $this->eloquentLog->count();
    }


}
