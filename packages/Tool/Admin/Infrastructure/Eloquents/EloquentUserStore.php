<?php

namespace Tool\Admin\Infrastructure\Eloquents;

/**
 */
class EloquentUserStore extends AppEloquent
{
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
      'email',
      'password',
      'role_id',
      'comment',
      'reorder'
    ];
}
