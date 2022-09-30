<?php

namespace Tool\User\Infrastructure\Eloquents;

class EloquentCity extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'cities';

    public function area_branch()
    {
        return $this->belongsTo(EloquentAreaBranch::class);
    }

    public function spots()
    {
        return $this->hasMany(EloquentSpot::class, 'city_id')->orderBy('id', 'ASC');
    }
}
