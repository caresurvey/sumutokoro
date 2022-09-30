<?php

namespace Tool\Common\Infrastructure\Eloquents;

class EloquentSpotPrice extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'spot_prices';

    public function price_genre()
    {
        return $this->belongsTo(EloquentPriceGenre::class);
    }
}
