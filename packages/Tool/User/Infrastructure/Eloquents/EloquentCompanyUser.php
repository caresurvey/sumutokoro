<?php

namespace Tool\User\Infrastructure\Eloquents;

class EloquentCompanyUser extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'company_user';

    public function company()
    {
        return $this->belongsTo(EloquentCompany::class);
    }

    public function user()
    {
        return $this->belongsTo(EloquentUser::class);
    }
}
