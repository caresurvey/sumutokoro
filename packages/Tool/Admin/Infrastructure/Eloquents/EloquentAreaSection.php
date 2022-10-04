<?php

namespace Tool\Admin\Infrastructure\Eloquents;

class EloquentAreaSection extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'area_sections';

    public function book()
    {
        return $this->belongsTo(EloquentBook::class);
    }
}
