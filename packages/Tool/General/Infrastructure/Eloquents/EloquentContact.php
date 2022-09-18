<?php

namespace Tool\General\Infrastructure\Eloquents;

class EloquentContact extends AppEloquent
{
    // DBのテーブル指定
    protected $table = 'contacts';

    // 日付扱いにするカラム
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // 変更するカラム
    protected $fillable = [
        'display',
        'name',
        'kana',
        'email',
        'tel',
        'reply',
        'msg',
        'ip',
    ];

    public function spots()
    {
        return $this->belongsToMany(EloquentSpot::class, 'spot_tag', 'tag_id', 'spot_id');
    }

    public function user()
    {
        return $this->belongsTo(EloquentUser::class);
    }
}
