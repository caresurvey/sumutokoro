<?php

namespace Tool\Admin\Infrastructure\Eloquents;

use Kyslik\ColumnSortable\Sortable;

class EloquentCompany extends AppEloquent
{
    use Sortable;

    // DBのテーブル指定
    protected $table = 'companies';

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
        'kana',
        'email',
        'zip1',
        'zip2',
        'address',
        'tel1',
        'tel2',
        'tel3',
        'fax',
        'lat',
        'lng',
        'search_words',
        'msg',
        'start',
        'president',
        'history',
        'capital',
        'staff',
        'city_id',
        'prefecture_id',
        'trade_area_id',
        'user_id',
    ];

    // 並び替えカラム
    protected $sortable = [
        'id',
        'display',
        'created_at',
        'name',
    ];

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
}
