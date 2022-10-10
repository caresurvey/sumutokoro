<?php

namespace Tool\General\Infrastructure\Eloquents;

class EloquentArea extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'areas';

    public function area()
    {
        return $this->belongsTo(EloquentArea::class);
    }
}
