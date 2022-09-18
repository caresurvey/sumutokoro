<?php

namespace Tool\General\Infrastructure\Repositories\Domain\Eloquent;

use Tool\General\Domain\Models\News\NewsRepository;
use Tool\General\Infrastructure\Eloquents\EloquentNews;
use Tool\General\Exceptions\GeneralNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use DB;

class EloquentNewsRepository implements NewsRepository
{

    private EloquentNews $eloquentNews;
    private int $limit = 30;

    public function __construct(
        EloquentNews $eloquentNews
    )
    {
        $this->eloquentNews = $eloquentNews;
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
        $data = new LengthAwarePaginator($list, $totalCount, $this->limit, $current, array('path' => config('myapp.app_path') . '/' . config('myapp.app_general_prefix') . '/news/'));

        // データを返す
        return [
            'news' => $data->items(),
            'current' => $current,
            'totalCount' => $totalCount,
            'fullPage' => (int)ceil($totalCount / $this->limit),
            'linkTag' => $data->links('vendor.pagination.default')->toHtml()
        ];
    }


    public function detail(int $id): EloquentNews
    {
        // 必要データの取得
        $data = $this->eloquentNews->where('id', $id)
            ->first();

        // データがない場合
        if (empty($data)) throw new GeneralNotFoundException();

        // データがあれば返す
        return $data;
    }
}
