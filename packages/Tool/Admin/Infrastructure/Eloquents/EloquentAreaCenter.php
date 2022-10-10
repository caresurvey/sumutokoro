<?php

namespace Tool\Admin\Infrastructure\Eloquents;

class EloquentAreaCenter extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'area_centers';

    public function area()
    {
        return $this->belongsTo(EloquentArea::class);
    }

    public function city()
    {
        return $this->belongsTo(EloquentCity::class);
    }

    public function prefecture()
    {
        return $this->belongsTo(EloquentPrefecture::class);
    }

    public function area_section()
    {
        return $this->belongsTo(EloquentAreaSection::class);
    }

    public function spots()
    {
        return $this->hasMany(EloquentSpot::class, 'area_center_id');
    }
}
