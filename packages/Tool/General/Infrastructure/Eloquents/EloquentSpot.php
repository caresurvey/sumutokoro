<?php

namespace Tool\General\Infrastructure\Eloquents;

use Kyslik\ColumnSortable\Sortable;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpace;

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

    public function area_center()
    {
        return $this->belongsTo(EloquentAreaCenter::class);
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

    public function spot_detail()
    {
        return $this->hasOne(EloquentSpotDetail::class, 'spot_id');
    }

    public function spot_prices()
    {
        return $this->hasMany(EloquentSpotPrice::class, 'spot_id')->orderBy('reorder', 'asc');
    }

    public function spot_plan()
    {
        return $this->belongsTo(EloquentSpotPlan::class);
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
        return $this->hasOne(EloquentSpotImage::class, 'spot_id')->orderBy('reorder', 'asc');
    }

    public function space()
    {
        return $this->belongsTo(EloquentSpace::class);
    }

    public function trade_area()
    {
        return $this->belongsTo(EloquentTradeArea::class);
    }

    public function user()
    {
        return $this->belongsTo(EloquentUser::class);
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
     * areaCenterIdでソート
     */
    public function areaCenterIdSortable($query, $direction)
    {
        return $query->orderBy('area_center_id', $direction);
    }

    /**
     * categoryIdでソート
     */
    public function categoryIdSortable($query, $direction)
    {
        return $query->orderBy('category_id', $direction);
    }

    /**
     * cityIdでソート
     */
    public function cityIdSortable($query, $direction)
    {
        return $query->orderBy('city_id', $direction);
    }

    /**
     * created_atでソート
     */
    public function createdAtSortable($query, $direction)
    {
        return $query->orderBy('created_at', $direction);
    }
}
