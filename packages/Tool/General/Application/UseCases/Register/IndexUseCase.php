<?php

namespace Tool\General\Application\UseCases\Register;

use Tool\General\Infrastructure\Eloquents\EloquentCity;
use Tool\General\Infrastructure\Eloquents\EloquentJobType;
use Tool\General\Infrastructure\Eloquents\EloquentPrefecture;
use Tool\General\Infrastructure\Eloquents\EloquentUserType;

class IndexUseCase
{
    private EloquentCity $eloquentCity;
    private EloquentJobType $eloquentJobType;
    private EloquentPrefecture $eloquentPrefecture;
    private EloquentUserType $eloquentUserType;

    public function __construct(
        EloquentCity $eloquentCity,
        EloquentJobType $eloquentJobType,
        EloquentPrefecture $eloquentPrefecture,
        EloquentUserType $eloquentUserType
    )
    {
        $this->eloquentCity = $eloquentCity;
        $this->eloquentJobType = $eloquentJobType;
        $this->eloquentPrefecture = $eloquentPrefecture;
        $this->eloquentUserType = $eloquentUserType;
    }

    public function __invoke(): array
    {
        // データを取得する
        $data['cities'] = $this->eloquentCity->where('display', 1)->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['job_types'] = $this->eloquentJobType->where('display', 1)->where('public', 1)->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['prefectures'] = $this->eloquentPrefecture->where('display', 1)->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['user_types'] = $this->eloquentUserType->where('display', 1)->where('public', 1)->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();

        // 取得データを返す
        return $data;
    }
}
