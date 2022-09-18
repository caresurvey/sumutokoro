<?php

namespace Tool\User\Infrastructure\Eloquents;

class EloquentSpotIconItem extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'spot_icon_items';

    public function spot_icon_genre()
    {
        return $this->belongsTo(EloquentSpotIconGenre::class)->orderBy('reorder', 'asc');
    }
}
