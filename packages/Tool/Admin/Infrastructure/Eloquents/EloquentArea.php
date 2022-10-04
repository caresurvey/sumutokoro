<?php

namespace Tool\Admin\Infrastructure\Eloquents;

class EloquentArea extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'areas';

    public function area_label()
    {
        return $this->belongsTo(EloquentAreaLabel::class);
    }
}
