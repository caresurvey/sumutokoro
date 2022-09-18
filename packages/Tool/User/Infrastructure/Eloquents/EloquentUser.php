<?php

namespace Tool\User\Infrastructure\Eloquents;

use Kyslik\ColumnSortable\Sortable;

class EloquentUser extends AppEloquent
{
    use Sortable;

    // DBのテーブル指定
    protected $table = 'users';

    // 日付扱いにするカラム
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // 変更するカラム
    protected $fillable = [
        'enabled',
        'name',
        'kana',
        'address',
        'tel1',
        'tel2',
        'tel3',
        'fax',
        'email',
        'prefecture_id',
        'city_id',
        'reorder'
    ];

    // 除外するカラム
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(EloquentRole::class);
    }

    public function user()
    {
        return $this->belongsTo(EloquentUser::class);
    }

    public function companies()
    {
        return $this->belongsToMany(EloquentCompany::class, 'company_user', 'user_id', 'company_id')->orderBy('id', 'desc');
    }

    public function spots()
    {
        return $this->belongsToMany(EloquentSpot::class, 'spot_user', 'user_id', 'spot_id')->orderBy('id', 'desc');
    }


    /**
     * idでソート
     */
    public function idSortable($query, $direction)
    {
        return $query->orderBy('id', $direction);
    }

    /**
     * nameでソート
     */
    public function nameSortable($query, $direction)
    {
        return $query->orderBy('name', $direction);
    }

    /**
     * emailでソート
     */
    public function emailSortable($query, $direction)
    {
        return $query->orderBy('email', $direction);
    }

    /**
     * roleでソート
     */
    public function roleIdSortable($query, $direction)
    {
        return $query->orderBy('role_id', $direction);
    }
}
