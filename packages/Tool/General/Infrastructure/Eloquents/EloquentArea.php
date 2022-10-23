<?php

namespace Tool\General\Infrastructure\Eloquents;

class EloquentArea extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'areas';

    public function area_center()
    {
        return $this->hasOne(EloquentAreaCenter::class, 'area_id');
    }

    public function area_label()
    {
        return $this->belongsTo(EloquentAreaLabel::class);
    }

    public function area_section()
    {
        return $this->belongsTo(EloquentAreaSection::class);
    }

    public function prefecture()
    {
        return $this->belongsTo(EloquentPrefecture::class);
    }
}
