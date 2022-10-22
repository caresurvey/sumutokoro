<?php

namespace Tool\General\Infrastructure\Eloquents;

class EloquentCity extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'cities';

    public function area_branch()
    {
        return $this->belongsTo(EloquentAreaBranch::class);
    }

    public function area_center()
    {
        return $this->hasOne(EloquentAreaCenter::class, 'city_id');
    }

    public function spots()
    {
        return $this->hasMany(EloquentSpot::class, 'city_id')->orderBy('id', 'ASC');
    }
}
