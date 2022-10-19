<?php

namespace Tool\General\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Support\Facades\Cache;
use Tool\General\Domain\Models\Icon\IconRepository;
use Tool\General\Exceptions\GeneralNotFoundException;
use Tool\General\Infrastructure\Eloquents\EloquentSpotIconStatus;
use DB;

class EloquentIconRepository implements IconRepository

{
    private EloquentSpotIconStatus $eloquentSpotIconStatus;

    public function __construct(
        EloquentSpotIconStatus $eloquentSpotIconStatus
    )
    {
        $this->eloquentSpotIconStatus = $eloquentSpotIconStatus;
    }

    public function makeDetailData(int $spot_id): array
    {
        //キャッシュからデータを取得（なければキャッシュに保存）
        $spot_icon_statuses = Cache::rememberForever("icon_make_detail_data_" . $spot_id, function () use($spot_id) {
            // データを取得
            $spot_icon_statuses = $this->eloquentSpotIconStatus
                ->where('spot_icon_item_id', '<>', 1)
                ->where('spot_icon_item_id', '<>', 38)
                ->where('spot_icon_item_id', '<>', 39)
                ->where('spot_id', $spot_id)
                ->with('spot_icon_item.spot_icon_genre.spot_icon_genre_comment', 'spot_icon_type')
                ->get();

            // データがない場合
            if (empty($spot_icon_statuses)) throw new GeneralNotFoundException();

            return $spot_icon_statuses;
        });


        // データの初期化
        $results = [];

        // 編集用データを作成
        foreach ($spot_icon_statuses->toArray() as $spot_icon_status) {
            $results[$spot_icon_status['spot_icon_item']['spot_icon_genre']['serial']]['id'] = $spot_icon_status['spot_icon_item']['spot_icon_genre']['id'];
            $results[$spot_icon_status['spot_icon_item']['spot_icon_genre']['serial']]['name'] = $spot_icon_status['spot_icon_item']['spot_icon_genre']['name'];
            $results[$spot_icon_status['spot_icon_item']['spot_icon_genre']['serial']]['serial'] = $spot_icon_status['spot_icon_item']['spot_icon_genre']['serial'];
            $results[$spot_icon_status['spot_icon_item']['spot_icon_genre']['serial']]['description'] = $spot_icon_status['spot_icon_item']['spot_icon_genre']['description'];
            $results[$spot_icon_status['spot_icon_item']['spot_icon_genre']['serial']]['comment'] = $spot_icon_status['spot_icon_item']['spot_icon_genre']['spot_icon_genre_comment']['comment'];
            $results[$spot_icon_status['spot_icon_item']['spot_icon_genre']['serial']]['data'][] = [
                'id' => $spot_icon_status['id'],
                'serial' => $spot_icon_status['spot_icon_item']['serial'],
                'name' => $spot_icon_status['spot_icon_item']['name'],
                'description' => $spot_icon_status['spot_icon_item']['description'],
                'value' => $spot_icon_status['spot_icon_type_id'],
                'reorder' => $spot_icon_status['spot_icon_item']['reorder'],
                'type' => $spot_icon_status['spot_icon_type'],
            ];
        }

        return $results;
    }

    public function setComments(array $spot_icon_status, array $comments): string
    {
        foreach($comments as $comment) {
            if($spot_icon_status['spot_icon_item']['spot_icon_genre']['id'] === $comment['spot_icon_genre_id']) {
                return $comment['comment'];
            }
        }

        return '';
    }

}
