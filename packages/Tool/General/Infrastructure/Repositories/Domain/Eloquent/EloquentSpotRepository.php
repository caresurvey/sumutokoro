<?php

namespace Tool\General\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Support\Facades\Cache;
use Tool\General\Domain\Models\Spot\SpotRepository;
use Tool\General\Domain\Models\Spot\SpotSearch;
use Tool\General\Infrastructure\Eloquents\EloquentArea;
use Tool\General\Infrastructure\Eloquents\EloquentSpot;
use Tool\General\Exceptions\GeneralNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use DB;

class EloquentSpotRepository implements SpotRepository
{
    private EloquentArea $eloquentArea;
    private EloquentSpot $eloquentSpot;
    private int $limit = 30;

    public function __construct(
        EloquentArea $eloquentArea,
        EloquentSpot $eloquentSpot
    )
    {
        $this->eloquentArea = $eloquentArea;
        $this->eloquentSpot = $eloquentSpot;
    }

    public function list(SpotSearch $search): array
    {
        // ページネートオブジェクトを作成
        $query = $this->eloquentSpot::query();

        // ソート機能追加
        $query->sortable();

        // 条件検索ページ以外からの検索の場合の処理
        if ($search->isSimple()) {
            if ($search->existsArea()) {
                $area = $this->eloquentArea->where('id', $search->getArea())->with('area_center.spots:id,area_center_id')->first();
                $spotIds = [];
                foreach($area['area_center']['spots'] as $spots) {
                    $spotIds[] = $spots['id'];
                }
                $query->whereIn('id', $spotIds);
            }
            if ($search->existsCity()) $query->orWhere('city_id', $search->getCity());
            if ($search->existsCategory()) $query->orWhere('category_id', $search->getCategory());
            if ($search->existsPriceRange()) $query->orWhere('price_range_id', $search->getPriceRange());
            if ($search->existsKeyword()) $query->where('name', 'like', '%' . $search->getKeyword() . '%');
        }

        // 条件検索ページからの検索の場合の処理
        if ($search->isMultiple()) {
            $preSpotIds = [];
            // city_idに一致するスポットIDを取得
            if ($search->existsCities()) {
                $citySpots = $this->eloquentSpot->whereIn('city_id', $search->getCities())->pluck('id');
                if ($citySpots->count() > 0) {
                    $preSpotIds = array_merge($preSpotIds, $citySpots->toArray());
                }
            }
            // category_idに一致するスポットIDを取得
            if ($search->existsCategories()) {
                $categorySpots = $this->eloquentSpot->whereIn('category_id', $search->getCategories())->pluck('id');
                if ($categorySpots->count() > 0) {
                    $preSpotIds = array_merge($preSpotIds, $categorySpots->toArray());
                }
            }

            // price_range_idに一致するスポットIDを取得
            if ($search->existsPriceRange()) {
                $priceRangeSpots = $this->eloquentSpot->where('price_range_id', $search->getPriceRange())->pluck('id');
                if ($priceRangeSpots->count() > 0) {
                    $preSpotIds = array_merge($preSpotIds, $priceRangeSpots->toArray());
                }
            }

            // 重複キーを排除
            $spotIds = array_unique($preSpotIds);

            // クエリに追加
            $query->whereIn('id', $spotIds);
        }

        // ベースの並び
        $query->orderBy('created_at', 'DESC');
        $query->orderBy('id', 'DESC');

        // リレーション
        $query->with(['spot_icon_statuses' => function ($query) {
            $query->where('spot_icon_genre_id', 2)->with('spot_icon_item', 'spot_icon_type');
        }]);

        // 現在のページを取得
        $current = Paginator::resolveCurrentPage();

        // 取得開始の件数を割り出す
        $skip = ($this->limit * $current) - $this->limit;

        // 検索結果の件数を取得
        $totalCount = $query->count();

        // 1ページ分のデータを取得
        $list = $query->skip($skip)->take($this->limit)->get();

        // ページネートを生成
        $data = new LengthAwarePaginator($list, $totalCount, $this->limit, $current, array('path' => config('myapp.app_path') . '/spot/?' . $search->getQuery()));

        return [
            'spots' => $data->items(),
            'current' => $current,
            'totalCount' => $totalCount,
            'fullPage' => (int)ceil($totalCount / $this->limit),
            'limit' => $this->limit,
            'linkTag' => $data->onEachSide(1)->links('vendor.pagination.default')->toHtml()
        ];
    }

    public function detail(int $id): array
    {
        //キャッシュからデータを取得（なければキャッシュに保存）
        $data = Cache::rememberForever("spot_detail_" . $id, function () use ($id) {
            $data = $this->eloquentSpot->where('id', $id)
                ->with(
                    'category',
                    'city',
                    'company',
                    'prefecture',
                    'spot_detail',
                    'spot_main_image',
                    'spot_plan',
                    'spot_prices.price_genre',
                    'user'
                )
                ->withCount('spot_images')
                ->first();

            // データがない場合例外を投げる
            if (empty($data)) {
                throw new GeneralNotFoundException();
            }

            return $data;
        });

        // データがあれば返す
        return $data->toArray();
    }

    public function count(): int
    {
        return $this->eloquentSpot->where('display', 1)->count();
    }
}
