<?php

namespace Tool\Admin\Infrastructure\Eloquents;

class EloquentPrefecture extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'prefectures';

    public function spots()
    {
        return $this->hasMany(EloquentSpot::class, 'prefecture_id')->orderBy('id', 'ASC');
    }
}
