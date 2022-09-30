<?php

namespace Tool\Common\Infrastructure\Eloquents;

class EloquentAreaBranch extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'area_branches';

    public function spots()
    {
        return $this->hasMany(EloquentSpot::class, 'area_branch_id')->orderBy('id', 'ASC');
    }
}
