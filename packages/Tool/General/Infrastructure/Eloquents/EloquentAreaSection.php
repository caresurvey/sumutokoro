<?php

namespace Tool\General\Infrastructure\Eloquents;

class EloquentAreaSection extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'area_sections';

    public function areas()
    {
        return $this->hasMany(EloquentArea::class, 'area_section_id')->orderBy('id', 'ASC');
    }

    public function area_centers()
    {
        return $this->hasMany(EloquentAreaCenter::class, 'area_section_id')->orderBy('id', 'ASC');
    }
}
