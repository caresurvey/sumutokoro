<?php

namespace Tool\Common\Infrastructure\Eloquents;

class EloquentSpot extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'spots';

    // 日付扱いにするカラム
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function area_center()
    {
        return $this->belongsTo(EloquentAreaCenter::class);
    }

    public function book_spot()
    {
        return $this->belongsToMany(EloquentBook::class, 'book_spot', 'spot_id', 'book_id');
    }

    public function category()
    {
        return $this->belongsTo(EloquentCategory::class);
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

    public function price_range()
    {
        return $this->belongsTo(EloquentPriceRange::class);
    }

    public function space()
    {
        return $this->belongsTo(EloquentSpace::class);
    }

    public function spot_icon_statuses()
    {
        return $this->hasMany(EloquentSpotIconStatus::class, 'spot_id');
    }

    public function spot_images()
    {
        return $this->hasMany(EloquentSpotImage::class, 'spot_id')->orderBy('reorder', 'asc');
    }

    public function spot_main_image()
    {
        return $this->hasOne(EloquentSpotImage::class, 'spot_id')->orderBy('reorder', 'asc')->where('tag', 'main');
    }

    public function spot_detail()
    {
        return $this->hasOne(EloquentSpotDetail::class, 'spot_id');
    }

    public function spot_icon_genre_comments()
    {
        return $this->hasMany(EloquentSpotIconGenreComment::class, 'spot_id')->orderBy('spot_icon_genre_id', 'asc');
    }

    public function spot_plan()
    {
        return $this->belongsTo(EloquentSpotPlan::class);
    }

    public function spot_prices()
    {
        return $this->hasMany(EloquentSpotPrice::class, 'spot_id')->orderBy('reorder', 'asc');
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
        return $this->belongsToMany(EloquentUser::class, 'spot_user', 'spot_id', 'user_id');
    }
}
