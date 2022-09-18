<?php

namespace Tool\Admin\Infrastructure\Eloquents;

class EloquentSpotDetail extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'spot_details';

    // 変更するカラム
    protected $fillable = [
        'kana',
        'subname',
        'email',
        'fax',
        'rooms',
        'staff',
        'staffs',
        'staff_age',
        'nurses',
        'nurse_time',
        'build_start',
        'open_start',
        'website',
        'introducer',
        'feature',
        'phone',
        'reserved_phone',
        'comment',
        'comment2',
        'company_name',
        'company_staff',
        'proarea',
        'spot_id',
    ];
}
