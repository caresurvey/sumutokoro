<?php

namespace Tool\General\Infrastructure\Eloquents;

class EloquentAreaLabel extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'area_labels';

    public function area()
    {
        return $this->hasOne(EloquentArea::class);
    }
}
