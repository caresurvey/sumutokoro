<?php

namespace Tool\Admin\Infrastructure\Eloquents;

class EloquentCategory extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'categories';

    public function spots()
    {
        return $this->hasMany(EloquentSpot::class, 'category_id')->orderBy('reorder', 'ASC');
    }
}
