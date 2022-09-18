<?php

namespace Tool\User\Infrastructure\Eloquents;

class EloquentSpotPriceForUpdate extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'spot_prices';

    // 変更するカラム
    protected $fillable = [
        'name',
        'user_id',
    ];
}
