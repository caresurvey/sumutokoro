<?php

namespace Tool\Admin\Infrastructure\Eloquents;

class EloquentSpotUser extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'spot_user';

    public function spot()
    {
        return $this->belongsTo(EloquentSpot::class);
    }

    public function user()
    {
        return $this->belongsTo(EloquentUser::class);
    }
}
