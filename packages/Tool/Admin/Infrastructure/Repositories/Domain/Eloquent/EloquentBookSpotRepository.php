<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Eloquent;

use Tool\Admin\Domain\Models\BookSpot\BookSpotRepository;
use Tool\Admin\Domain\Models\BookSpot\PublishSpots;
use Tool\Admin\Exceptions\AdminNotFoundException;
use Tool\Admin\Infrastructure\Eloquents\EloquentBookSpot;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpot;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\FormatConditions;
use DB;

class EloquentBookSpotRepository implements BookSpotRepository
{
    private EloquentBookSpot $EloquentBookSpot;
    private EloquentSpot $EloquentSpot;
    private int $limit = 30;

    public function __construct(
        EloquentBookSpot         $eloquentBookSpot,
        EloquentSpot             $eloquentSpot
    )
    {
        $this->eloquentBookSpot = $eloquentBookSpot;
        $this->eloquentSpot = $eloquentSpot;
    }

    public function makePublishSpots(FormatConditions $conditions): PublishSpots
    {
        // どっから取る？book_sectionから？

        // 中間テーブルから該当するSpotのIdをすべて取得
        $spotIds = $this->eloquentBookSpot
            ->where('book_id', $conditions->getBookId())
            ->with(
                'spot:id,area_center_id,category_id,city_id',
                'spot.area_center:id,area_id,city_id,reorder',
                'spot.category:id,reorder',
                'spot.city:id,serial,reorder',
            )
            ->get();

        // データがない場合
        if($spotIds->count() <= 0) throw new AdminNotFoundException();

        // モデルを作成して返す
        return new PublishSpots(
            $spotIds->toArray()
        );
    }
}
