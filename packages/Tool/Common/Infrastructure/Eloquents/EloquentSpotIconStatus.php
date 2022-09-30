<?php

namespace Tool\Common\Infrastructure\Eloquents;

class EloquentSpotIconStatus extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'spot_icon_statuses';

    public function spot_icon_item()
    {
        return $this->belongsTo(EloquentSpotIconItem::class)->orderBy('reorder', 'asc');
    }

    public function spot_icon_type()
    {
        return $this->belongsTo(EloquentSpotIconType::class)->orderBy('reorder', 'asc');
    }

    public function spot()
    {
        return $this->belongsTo(EloquentSpot::class);
    }
}
