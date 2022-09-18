<?php

namespace Tool\General\Infrastructure\Eloquents;

class EloquentSpotIconGenre extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'spot_icon_genres';

    public function spot_icon_genre_comment()
    {
        return $this->hasOne(EloquentSpotIconGenreComment::class, 'spot_icon_genre_id');
    }
}
