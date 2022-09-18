<?php

namespace Tool\User\Infrastructure\Eloquents;

class EloquentSpotPrice extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'spot_prices';

    // 変更するカラム
    protected $fillable = [
        'name',
        'description',
        'ps',
        'reorder',
        'price_genre_id',
        'spot_id',
        'user_id',
    ];

    public function price_genre()
    {
        return $this->belongsTo(EloquentPriceGenre::class);
    }
}
