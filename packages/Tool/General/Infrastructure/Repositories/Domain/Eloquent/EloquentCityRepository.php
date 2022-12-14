<?php

namespace Tool\General\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Support\Facades\Cache;
use Tool\General\Exceptions\GeneralNotFoundException;
use Tool\General\Infrastructure\Eloquents\EloquentCity;
use Tool\General\Domain\Models\City\CityRepository;

class EloquentCityRepository implements CityRepository
{
    private EloquentCity $eloquentCity;

    public function __construct(EloquentCity $eloquentCity)
    {
        // モデル
        $this->eloquentCity = $eloquentCity;
    }

    public function list(): array
    {
        //キャッシュからデータを取得（なければキャッシュに保存）
        return Cache::rememberForever("spot_detail_cities", function () {
            // データを取得
            return $this->eloquentCity
                ->where('display', 1)
                ->orderBy('reorder', 'ASC')
                ->pluck('name', 'id')
                ->toArray();
        });
    }
}
