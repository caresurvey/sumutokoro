<?php

namespace Tool\Admin\Infrastructure\Eloquents;

class EloquentSpotIconStatusForUpdate extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'spot_icon_statuses';

    // 変更するカラム
    protected $fillable = [
        'name',
        'user_id'
    ];
}
