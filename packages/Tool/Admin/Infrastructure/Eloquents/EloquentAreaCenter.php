<?php

namespace Tool\Admin\Infrastructure\Eloquents;

use Kyslik\ColumnSortable\Sortable;

class EloquentAreaCenter extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'area_centers';

    public function area()
    {
        return $this->belongsTo(EloquentArea::class);
    }

    public function spots()
    {
        return $this->hasMany(EloquentSpot::class, 'area_center_id');
    }
}
