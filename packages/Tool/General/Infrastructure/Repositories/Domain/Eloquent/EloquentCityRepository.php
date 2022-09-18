<?php

namespace Tool\General\Infrastructure\Repositories\Domain\Eloquent;

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
        // データを取得
        $data = $this->eloquentCity
        ->where('display', 1)
        ->orderBy('reorder', 'ASC')
        ->pluck('name', 'id')
        ->toArray();

        return $data;
    }
}
