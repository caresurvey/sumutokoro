<?php

namespace Tool\General\Infrastructure\Eloquents;

class EloquentAreaCenter extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'area_centers';

    public function area()
    {
        return $this->belongsTo(EloquentArea::class);
    }

    public function area_section()
    {
        return $this->belongsTo(EloquentAreaSection::class);
    }

    public function city()
    {
        return $this->belongsTo(EloquentCity::class);
    }


    public function spots()
    {
        return $this->hasMany(EloquentSpot::class, 'area_center_id')->orderBy('id', 'ASC');
    }
}
