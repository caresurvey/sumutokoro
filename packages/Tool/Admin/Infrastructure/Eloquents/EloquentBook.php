<?php

namespace Tool\Admin\Infrastructure\Eloquents;

use Kyslik\ColumnSortable\Sortable;

class EloquentBook extends AppEloquent
{
    use Sortable;

    // DBのテーブル指定
    protected $table = 'books';

    // 日付扱いにするカラム
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // 変更するカラム
    protected $fillable = [
        'display',
        'name',
        'sellout',
        'reorder',
        'user_id',
    ];

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
     * reorderでソート
     */
    public function reorderSortable($query, $direction)
    {
        return $query->orderBy('reorder', $direction);
    }
}
