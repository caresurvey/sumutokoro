<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Eloquent;

use Tool\Admin\Infrastructure\Eloquents\EloquentPrefecture;
use Tool\Admin\Domain\Models\Prefecture\PrefectureRepository;

class EloquentPrefectureRepository implements PrefectureRepository
{
    private EloquentPrefecture $eloquentPrefecture;

    public function __construct(EloquentPrefecture $eloquentPrefecture)
    {
        $this->eloquentPrefecture = $eloquentPrefecture;
    }

    /**
     * @return array
     */
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
