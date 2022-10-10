<?php

namespace Tool\General\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Support\Facades\Cache;
use Tool\General\Exceptions\GeneralNotFoundException;
use Tool\General\Infrastructure\Eloquents\EloquentSpotIconType;
use Tool\General\Domain\Models\SpotIconType\SpotIconTypeRepository;

class EloquentSpotIconTypeRepository implements CityRepository
{
    private EloquentSpotIconType $eloquentSpotIconType;

    public function __construct(EloquentSpotIconType $eloquentSpotIconType)
    {
        // モデル
        $this->eloquentSpotIconType = $eloquentCity;
    }

    public function list(): array
    {
        //キャッシュからデータを取得（なければキャッシュに保存）
        return Cache::rememberForever("spot_icon_types", function () {
            // データを取得
            return $this->eloquentSpotIconType
                ->orderBy('reorder', 'ASC')
                ->get()
                ->toArray();
        });
    }
}
