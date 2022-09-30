<?php

namespace Tool\Common\Infrastructure\Eloquents;

class EloquentUser extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'users';

    public function role()
    {
        return $this->belongsTo(EloquentRole::class);
    }

    public function spots()
    {
        return $this->belongsToMany(EloquentSpot::class, 'spot_user', 'user_id', 'spot_id');
    }

    public function companies()
    {
        return $this->belongsToMany(EloquentCompany::class, 'company_user', 'user_id', 'company_id');
    }

    public function user()
    {
        return $this->belongsTo(EloquentUser::class);
    }
}
