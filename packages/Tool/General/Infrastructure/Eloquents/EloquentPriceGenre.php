<?php

namespace Tool\General\Infrastructure\Eloquents;

class EloquentPriceGenre extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'price_genres';

    public function spot_prices()
    {
        return $this->hasMany(EloquentSpotPrice::class, 'spot_price_id')->orderBy('reorder', 'asc');
    }
}
