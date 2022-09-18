<?php

namespace Tool\Admin\Infrastructure\Eloquents;

use Kyslik\ColumnSortable\Sortable;

class EloquentLog extends AppEloquent
{
    use Sortable;

    // DBのテーブル指定
    protected $table = 'logs';
}
