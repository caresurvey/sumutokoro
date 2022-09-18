<?php

namespace Tool\General\Infrastructure\Eloquents;

use Kyslik\ColumnSortable\Sortable;
use Tool\Admin\Infrastructure\Eloquents\EloquentRole;

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

    public function role()
    {
        return $this->belongsTo(EloquentRole::class);
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
