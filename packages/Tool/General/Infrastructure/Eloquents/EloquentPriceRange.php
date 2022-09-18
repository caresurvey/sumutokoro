<?php

namespace Tool\General\Infrastructure\Eloquents;

class EloquentPriceRange extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'price_ranges';

    public function spots()
    {
        return $this->hasMany(EloquentSpot::class, 'price_range_id')->orderBy('reorder', 'ASC');
    }
}
