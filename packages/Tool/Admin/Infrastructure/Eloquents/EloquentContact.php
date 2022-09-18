<?php

namespace Tool\Admin\Infrastructure\Eloquents;

use Kyslik\ColumnSortable\Sortable;

class EloquentContact extends AppEloquent
{
    use Sortable;

    // DBのテーブル指定
    protected $table = 'contacts';

    // 日付扱いにするカラム
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
