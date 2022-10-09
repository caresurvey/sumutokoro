<?php

namespace Tool\General\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Support\Facades\Cache;
use Tool\General\Infrastructure\Eloquents\EloquentPrefecture;
use Tool\General\Domain\Models\Prefecture\PrefectureRepository;

class EloquentPrefectureRepository implements PrefectureRepository
{
    private EloquentPrefecture $eloquentPrefecture;

    public function __construct(
        EloquentPrefecture $eloquentPrefecture
    )
    {
        // モデル
        $this->eloquentPrefecture = $eloquentPrefecture;
    }

    public function list(): array
    {
        //キャッシュからデータを取得（なければキャッシュに保存）
        return Cache::rememberForever("spot_detail_prefectures", function () {
            // データを取得
            return $this->eloquentPrefecture
                ->where('display', 1)
                ->orderBy('reorder', 'ASC')
                ->pluck('name', 'id')
                ->toArray();
        });
    }
}
