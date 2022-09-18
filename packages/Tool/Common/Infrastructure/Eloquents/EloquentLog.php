<?php

namespace Tool\Common\Infrastructure\Eloquents;

class EloquentLog extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'logs';

    // 変更するカラム
    protected $fillable = [
        'log',
        'prefix',
        'page',
        'action',
        'column_id',
        'value',
        'ip',
        'user_name',
        'user_id',
    ];
}
