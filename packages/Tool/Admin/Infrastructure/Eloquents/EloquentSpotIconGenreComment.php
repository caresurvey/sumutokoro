<?php

namespace Tool\Admin\Infrastructure\Eloquents;

class EloquentSpotIconGenreComment extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'spot_icon_genre_comments';

    // 変更するカラム
    protected $fillable = [
        'display',
        'comment',
        'spot_icon_genre_id',
        'spot_id',
        'user_id',
    ];
}
