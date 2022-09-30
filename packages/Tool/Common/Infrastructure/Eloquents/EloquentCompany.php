<?php

namespace Tool\Common\Infrastructure\Eloquents;

class EloquentCompany extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'companies';

    public function categories()
    {
        return $this->belongsToMany(EloquentCategory::class, 'category_company', 'category_id', 'company_id');
    }

    public function city()
    {
        return $this->belongsTo(EloquentCity::class);
    }

    public function company()
    {
        return $this->belongsTo(EloquentCompany::class);
    }

    public function prefecture()
    {
        return $this->belongsTo(EloquentPrefecture::class);
    }

    public function spot_plan()
    {
        return $this->belongsTo(EloquentSpotPlan::class);
    }

    public function spots()
    {
        return $this->hasMany(EloquentSpot::class, 'spot_id')->orderBy('id', 'ASC');
    }

    public function trade_area()
    {
        return $this->belongsTo(EloquentTradeArea::class);
    }

    public function user()
    {
        return $this->belongsTo(EloquentUser::class);
    }

    public function users()
    {
        return $this->belongsToMany(EloquentUser::class, 'company_user', 'company_id', 'user_id');
    }
}
