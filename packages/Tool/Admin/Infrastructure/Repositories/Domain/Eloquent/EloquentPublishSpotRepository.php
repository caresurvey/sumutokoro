<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Eloquent;

use Tool\Admin\Domain\Models\Spot\PublishSpotRepository;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpot;
use DB;
use Tool\Admin\Infrastructure\Repositories\Domain\Publish\ElementarySpot;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\FormatConditions;

class EloquentPublishSpotRepository implements PublishSpotRepository
{
    private EloquentSpot $eloquentSpot;

    public function __construct(
        EloquentSpot $eloquentSpot
    )
    {
        $this->eloquentSpot = $eloquentSpot;
    }

    public function getPublishSpots(array $area_centers, FormatConditions $conditions): ElementarySpot
    {
        // 初期化
        $results = [];

        // データ数のカウント
        $count = 0;

        // spot取得用のデータを作成
        foreach ($area_centers as $key => $area_center) {
            $result['spots'] = [];
            foreach ($area_center['spots'] as $spot) {
                $result['spots'][] = $spot['id'];
                $count++;
            }

            // データがあれば追加
            $result['area_center']['id'] = $area_center['id'];
            $result['area_center']['book_label'] = $area_center['book_label'];
            $result['area_center']['book_reorder'] = $area_center['book_reorder'];
            $result['area_center']['area_section_id'] = $area_center['area_section_id'];
            $result['area_center']['city_id'] = $area_center['city_id'];
            $result['area_center']['is_cover'] = true;
            $result['area_center']['area'] = $area_center['area']->toArray();
            $result['book_spot'][0] = $area_center['area_section']['book']->toArray();
            $results[$key] = $result;
        }

        return new ElementarySpot($results);
    }

    public function makePublishSpots(ElementarySpot $elementarySpots, FormatConditions $conditions): array
    {
        // 初期化
        $results = [];

        // spotデータ取得
        foreach ($elementarySpots->getData() as $elementarySpot) {
            $spots = $this->eloquentSpot
                ->whereIn('id', $elementarySpot['spots'])
                ->where('is_book', 1)
                ->where('display', 1)
                ->with(
                    'area_center.area.area_label',
                    'area_center.area_section.book',
                    'book_spot',
                    'category',
                    'city',
                    'company',
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
                ->withCount('book_spot')
                ->having('book_spot_count', '>', 0)
                ->get();

            // カテゴリごとに並べ替え
            $spots = $spots->sortBy('category.book_reorder');

            // 先頭に扉データを追加
            $spots->prepend($elementarySpot);

            // データを結合
            $results = array_merge($results, $spots->all());
        }

        // すべて結合した配列データを返す
        return $results;
    }

    public function pickupPublishSpots(array $allSpots, FormatConditions $conditions): array
    {
        // 初期化
        $results = [];
        $count = 1;

        foreach($allSpots as $spot) {
            if($conditions->isInRange($count)) {
                $results[] = $spot;
            }
            $count++;
        }
        return $results;
    }

    /**
     * キュー用に分ける
     * @param array $spots
     * @return array
     */
    public function splitSpotByQueue(array $spots): array
    {
        // データ初期化
        $results = [];

        // ループカウント
        $count = 0;

        // 登録するキュー数
        $queue = 0;

        // spotの数だけ処理
        foreach($spots as $spot) {
            $results[$queue][] = $spot;
            // 20ページになったらキュー追加
            $count++;
            if($count >= 80) {
                $queue++;
                $count = 0;
            }
        }

        return $results;
    }
}