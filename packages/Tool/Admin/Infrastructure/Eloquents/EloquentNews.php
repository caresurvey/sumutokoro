<?php

namespace Tool\Admin\Infrastructure\Eloquents;

use Kyslik\ColumnSortable\Sortable;

class EloquentNews extends AppEloquent
{
    use Sortable;

    // DBのテーブル指定
    protected $table = 'news';

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
      'body',
      'more',
      'url',
      'user_id',
    ];

    /**
     * リレーション
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(EloquentUser::class)->select('id', 'name', 'role_id', 'reorder');
    }

    /**
     * ソート
     */
    public function idSortable($query, $direction)
    {
        return $query->orderBy('id', $direction);
    }

    /**
     * ソート
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
