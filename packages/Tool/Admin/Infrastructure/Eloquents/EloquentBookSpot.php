<?php

namespace Tool\Admin\Infrastructure\Eloquents;

class EloquentBookSpot extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'book_spot';

    public function book()
    {
        return $this->belongsTo(EloquentBook::class);
    }

    public function spot()
    {
        return $this->belongsTo(EloquentSpot::class);
    }
}
