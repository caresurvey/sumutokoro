<?php

namespace Tool\Admin\Infrastructure\Eloquents;

class EloquentBookSection extends AppEloquent
{

    // DBのテーブル指定
    protected $table = 'book_sections';

    // 日付扱いにするカラム
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function book()
    {
        return $this->belongsTo(EloquentBook::class);
    }
}
