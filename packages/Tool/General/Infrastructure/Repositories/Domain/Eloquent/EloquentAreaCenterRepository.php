<?php

namespace Tool\General\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Support\Facades\Cache;
use Tool\General\Exceptions\GeneralNotFoundException;
use Tool\General\Infrastructure\Eloquents\EloquentAreaCenter;
use Tool\General\Domain\Models\AreaCenter\AreaCenterRepository;

class EloquentAreaCenterRepository implements AreaCenterRepository
{
    private EloquentAreaCenter $eloquentAreaCenter;

    public function __construct(EloquentAreaCenter $eloquentAreaCenter)
    {
        // モデル
        $this->eloquentAreaCenter = $eloquentAreaCenter;
    }

    public function list(): array
    {
        //キャッシュからデータを取得（なければキャッシュに保存）
        return Cache::rememberForever("spot_detail_area_centers", function () {
            // データを取得
            return $this->eloquentAreaCenter
                ->where('display', 1)
                ->where('id', '<>', 1)
                ->orderBy('id', 'ASC')
                ->pluck('label', 'id')
                ->toArray();
        });
    }
}
