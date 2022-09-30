<?php

namespace Tool\Admin\Infrastructure\Eloquents;

use Kyslik\ColumnSortable\Sortable;

class EloquentArea extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'areas';

    public function area()
    {
        return $this->belongsTo(EloquentArea::class);
    }
}
