<?php

namespace Tool\User\Infrastructure\Eloquents;

class EloquentPassword extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'users';

    // 変更するカラム
    protected $fillable = [
        'password',
    ];
}
