<?php

namespace Tool\Admin\Infrastructure\Eloquents;

class EloquentSpotImage extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'spot_images';

    // 変更するカラム
    protected $fillable = [
        'display',
        'name',
        'tag',
        'msg',
        'reorder',
        'spot_id',
        'user_id',
    ];
}
