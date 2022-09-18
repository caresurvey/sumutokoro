<?php

namespace Tool\Admin\Infrastructure\Eloquents;

class EloquentCity extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'cities';

    public function companies()
    {
        return $this->hasMany(EloquentCompany::class, 'city_id')->orderBy('id', 'ASC');
    }

    public function spots()
    {
        return $this->hasMany(EloquentSpot::class, 'city_id')->orderBy('id', 'ASC');
    }
}
