<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Support\Collection;
use Tool\Admin\Domain\Models\Spot\PublishSpotRepository;
use Tool\Admin\Domain\Models\Spot\PublishSpots;
use Tool\Admin\Exceptions\AdminNotFoundException;
use Tool\Admin\Infrastructure\Eloquents\EloquentAreaCenter;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpot;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\FormatConditions;
use DB;

class EloquentPublishSpotRepository implements PublishSpotRepository
{
    private EloquentAreaCenter $eloquentAreaCenter;
    private EloquentSpot $eloquentSpot;

    public function __construct(
        EloquentAreaCenter $eloquentAreaCenter,
        EloquentSpot        $eloquentSpot
    )
    {
        $this->eloquentAreaCenter = $eloquentAreaCenter;
        $this->eloquentSpot = $eloquentSpot;
    }

    public function makePublishSpots(FormatConditions $conditions): array
    {
        // この辺の処理を全部バラす

        // 中間テーブルから該当するSpotのIdをすべて取得
        $bookSections = $this->eloquentAreaCenter
            ->where('area_section_id', 2)
            ->orderBy('book_reorder', 'asc')
            ->with('spots:id,area_center_id')
            ->get();

        // spot取得用のデータを作成
        $preResults = [];
        foreach($bookSections as $bookSection) {
            $result = [];
            $result['area_center']['id'] = $bookSection['id'];
            $result['area_center']['book_reorder'] = $bookSection['book_reorder'];
            $result['area_center']['area_section_id'] = $bookSection['area_section_id'];
            $result['area_center']['city_id'] = $bookSection['city_id'];
            foreach($bookSection['spots'] as $spot) {
                $result['spots'][] = $spot['id'];
            }
            $preResults[] = $result;
        }

        // spotデータ取得
        $results = [];
        foreach($preResults as $preResult) {
            //$results[$preResult['area_center']['book_reorder']]['area_center'] = $preResult['area_center'];
            $area_center = $preResult['area_center'];
            $spots = $this->eloquentSpot
                ->whereIn('id', $preResult['spots'])
                ->where('is_book', 1)
                ->with(
                    'area_center.area',
                    'book_spot',
                    'category',
                    'city',
                    'company',
                    'spot_main_image',
                    'prefecture',
                    'spot_detail',
                    'spot_main_image',
                    'spot_icon_genre_comments',
                    'spot_icon_statuses.spot_icon_type',
                    'spot_icon_statuses.spot_icon_item',
                    'spot_plan',
                    'spot_prices.price_genre',
                    'space',
                    'user'
                )
                ->get();

            // カテゴリごとに並べ替え
            $spots = $spots->sortBy('category.book_reorder');

            // 先頭に扉データを追加
            $spots->prepend($area_center);

            return $spots->all();
        }

        // 間に扉フォーマットを差し込む
        dd($results);
        echo 'ここまで';
        exit;

        return $results;
    }
}
