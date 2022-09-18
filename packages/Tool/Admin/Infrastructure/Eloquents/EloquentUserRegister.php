<?php

namespace Tool\Admin\Infrastructure\Eloquents;

class EloquentUserRegister extends AppEloquent
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
        'kana',
        'zip1',
        'zip2',
        'address',
        'tel1',
        'tel2',
        'tel3',
        'fax',
        'email',
        'password',
        'is_authenticated',
        'authenticated_msg',
        'company',
        'lat',
        'lng',
        'msg',
        'reorder',
        'prefecture_id',
        'city_id',
        'role_id',
        'trade_area_id',
        'user_type_id',
    ];
}
