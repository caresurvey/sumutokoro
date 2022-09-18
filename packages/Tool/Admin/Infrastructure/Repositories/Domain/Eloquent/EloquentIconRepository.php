<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Eloquent;

use Tool\Admin\Domain\Models\Icon\IconRepository;
use Tool\Admin\Exceptions\AdminNotFoundException;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpotIconStatus;

class EloquentIconRepository implements IconRepository

{
    private EloquentSpotIconStatus $eloquentSpotIconStatus;

    public function __construct(
        EloquentSpotIconStatus $eloquentSpotIconStatus
    )
    {
        $this->eloquentSpotIconStatus = $eloquentSpotIconStatus;
    }

    public function makeEditData(int $spot_id, array $comments): array
    {
        // データを取得
        $spot_icon_statuses = $this->eloquentSpotIconStatus
            ->where('spot_icon_item_id', '<>', 1)
            ->where('spot_id', $spot_id)
            ->with('spot_icon_item.spot_icon_genre', 'spot_icon_type')
            ->get();

        // データがない場合
        if (empty($spot_icon_statuses)) throw new AdminNotFoundException();

        // データの初期化
        $results = [];

        // 編集用データを作成
        foreach ($spot_icon_statuses->toArray() as $spot_icon_status) {
            $results[$spot_icon_status['spot_icon_item']['spot_icon_genre']['serial']]['id'] = $spot_icon_status['spot_icon_item']['spot_icon_genre']['id'];
            $results[$spot_icon_status['spot_icon_item']['spot_icon_genre']['serial']]['name'] = $spot_icon_status['spot_icon_item']['spot_icon_genre']['name'];
            $results[$spot_icon_status['spot_icon_item']['spot_icon_genre']['serial']]['description'] = $spot_icon_status['spot_icon_item']['spot_icon_genre']['description'];
            $results[$spot_icon_status['spot_icon_item']['spot_icon_genre']['serial']]['comment'] = $this->setComments($spot_icon_status, $comments);
            $results[$spot_icon_status['spot_icon_item']['spot_icon_genre']['serial']]['data'][] = [
                'id' => $spot_icon_status['id'],
                'serial' => $spot_icon_status['spot_icon_item']['serial'],
                'name' => $spot_icon_status['spot_icon_item']['name'],
                'description' => $spot_icon_status['spot_icon_item']['description'],
                'value' => $spot_icon_status['spot_icon_type_id'],
                'reorder' => $spot_icon_status['spot_icon_item']['reorder'],
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
