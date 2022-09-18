<?php

namespace Tool\General\Infrastructure\Eloquents;

class EloquentPasswordUser extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'users';

    // 変更するカラム
    protected $fillable = [
        'password',
    ];
}
