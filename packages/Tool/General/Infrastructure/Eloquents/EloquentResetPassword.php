<?php

namespace Tool\General\Infrastructure\Eloquents;

class EloquentResetPassword extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'reset_passwords';

    // 変更するカラム
    protected $fillable = [
        'email',
        'token',
    ];
}
