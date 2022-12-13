<?php

namespace Tool\User\Infrastructure\Eloquents;

use Kyslik\ColumnSortable\Sortable;

class EloquentSpot extends AppEloquent
{
    use Sortable;

    // DBのテーブル指定
    protected $table = 'spots';

    // 日付扱いにするカラム
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // 変更するカラム
    protected $fillable = [
        'display',
        'preview',
        'name',
        'longname',
        'zip1',
        'zip2',
        'address',
        'tel1',
        'tel2',
        'tel3',
        'document',
        'vacancy',
        'viewing',
        'heading',
        'message',
        'monthly_price_min',
        'monthly_price_max',
        'for_check_monthly',
        'movein_price_min',
        'movein_price_max',
        'for_check_movein',
        'is_selfpay',
        'room_size',
        'lat',
        'lng',
        'search_words',
        'area_center_id',
        'category_id',
        'city_id',
        'company_id',
        'prefecture_id',
        'price_range_id',
        'spot_plan_id',
        'trade_area_id',
        'user_id',
    ];

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

    public function user()
    {
        return $this->belongsTo(EloquentUser::class);
    }

    public function users()
    {
        return $this->belongsToMany(EloquentUser::class, 'spot_user', 'spot_id', 'user_id');
    }

    /**
     * idでソート
     */
    public function idSortable($query, $direction)
    {
        return $query->orderBy('id', $direction);
    }

    /**
     * displayでソート
     */
    public function displaySortable($query, $direction)
    {
        return $query->orderBy('display', $direction);
    }

    /**
     * nameでソート
     */
    public function nameSortable($query, $direction)
    {
        return $query->orderBy('name', $direction);
    }

    /**
     * created_atでソート
     */
    public function createdAtSortable($query, $direction)
    {
        return $query->orderBy('created_at', $direction);
    }

    /**
     * spot_main_image_countでソート
     */
    public function spotMainImageCountSortable($query, $direction)
    {
        return $query->orderBy('spot_main_image_count', $direction);
    }
}
