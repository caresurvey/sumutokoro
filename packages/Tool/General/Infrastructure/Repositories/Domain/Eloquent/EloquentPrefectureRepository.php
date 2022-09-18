<?php

namespace Tool\General\Infrastructure\Repositories\Domain\Eloquent;

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
        // データを取得
        $data = $this->eloquentPrefecture
        ->where('display', 1)
        ->orderBy('reorder', 'ASC')
        ->pluck('name', 'id')
        ->toArray();

        return $data;
    }
}
