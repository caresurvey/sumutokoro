<?php

namespace Tool\User\Infrastructure\Eloquents;

class EloquentSpotIconStatusForUpdate extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'spot_icon_statuses';

    // 変更するカラム
    protected $fillable = [
        'spot_icon_type_id'
    ];
}
