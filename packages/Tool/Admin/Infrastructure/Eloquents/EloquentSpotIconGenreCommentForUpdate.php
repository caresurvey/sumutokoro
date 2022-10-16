<?php

namespace Tool\Admin\Infrastructure\Eloquents;

class EloquentSpotIconGenreCommentForUpdate extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'spot_icon_genre_comments';

    // 変更するカラム
    protected $fillable = [
        'comment',
    ];
}
