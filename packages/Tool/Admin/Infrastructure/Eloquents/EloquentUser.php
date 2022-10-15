<?php

namespace Tool\Admin\Infrastructure\Eloquents;

use Kyslik\ColumnSortable\Sortable;

/**
 */
class EloquentUser extends AppEloquent
{
    use Sortable;

    // DBのテーブル指定
    protected $table = 'users';

    // 日付扱いにするカラム
    protected $dates = [
        'created_at',
        'updated_at',
        'authenticated_date',
    ];

    // 変更するカラム
    protected $fillable = [
        'enabled',
        'name',
        'kana',
        'zip1',
        'zip2',
        'fax',
        'address',
        'tel1',
        'tel2',
        'tel3',
        'fax',
        'email',
        'is_authenticated',
        'authenticated_msg',
        'authenticated_date',
        'company',
        'prefecture_id',
        'city_id',
        'job_type_id',
        'role_id',
        'user_type_id',
        'msg',
        'reorder'
    ];

    public function city()
    {
        return $this->belongsTo(EloquentCity::class);
    }

    public function job_type()
    {
        return $this->belongsTo(EloquentJobType::class);
    }

    public function role()
    {
        return $this->belongsTo(EloquentRole::class);
    }

    public function prefecture()
    {
        return $this->belongsTo(EloquentPrefecture::class);
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

    public function user_type()
    {
        return $this->belongsTo(EloquentUserType::class);
    }

    /**
     * idでソート
     */
    public function idSortable($query, $direction)
    {
        return $query->orderBy('id', $direction);
    }

    /**
     * enabledでソート
     */
    public function enabledSortable($query, $direction)
    {
        return $query->orderBy('enabled', $direction);
    }

    /**
     * created_atでソート
     */
    public function createdAtSortable($query, $direction)
    {
        return $query->orderBy('created_at', $direction);
    }

    /**
     * nameでソート
     */
    public function nameSortable($query, $direction)
    {
        return $query->orderBy('name', $direction);
    }

    /**
     * is_authenticatedでソート
     */
    public function isAuthenticatedSortable($query, $direction)
    {
        return $query->orderBy('is_authenticated', $direction);
    }

    /**
     * roleでソート
     */
    public function roleIdSortable($query, $direction)
    {
        return $query->orderBy('role_id', $direction);
    }
}
