<?php

namespace Tool\General\Infrastructure\Eloquents;

class EloquentAreaCenter extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'area_centers';

    public function area()
    {
        return $this->belongsTo(EloquentAreaCenter::class);
    }
}
