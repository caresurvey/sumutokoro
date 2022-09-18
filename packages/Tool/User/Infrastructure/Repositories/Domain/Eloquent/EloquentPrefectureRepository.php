<?php

namespace Tool\User\Infrastructure\Repositories\Domain\Eloquent;

use Tool\User\Infrastructure\Eloquents\EloquentPrefecture;
use Tool\User\Domain\Models\Prefecture\PrefectureRepository;

class EloquentPrefectureRepository implements PrefectureRepository
{
    private EloquentPrefecture $eloquentPrefecture;

    public function __construct(EloquentPrefecture $eloquentPrefecture)
    {
        $this->eloquentPrefecture = $eloquentPrefecture;
    }

    public function list(): array
    {
        // データを取得
        return $this->eloquentPrefecture
            ->where('display', 1)
            ->orderBy('reorder', 'ASC')
            ->pluck('name', 'id')
            ->toArray();
    }
}
