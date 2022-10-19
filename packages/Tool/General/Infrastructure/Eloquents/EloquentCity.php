<?php

namespace Tool\General\Infrastructure\Eloquents;

class EloquentCity extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'cities';

    public function areas()
    {
        return $this->hasMany(EloquentArea::class, 'city_id')->orderBy('id', 'ASC');
    }

    public function area_branch()
    {
        return $this->belongsTo(EloquentAreaBranch::class);
    }

    public function spots()
    {
        return $this->hasMany(EloquentSpot::class, 'city_id')->orderBy('id', 'ASC');
    }
}
