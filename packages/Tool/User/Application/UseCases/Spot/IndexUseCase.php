<?php

namespace Tool\User\Application\UseCases\Spot;

use Tool\User\Application\Requests\Spot\IndexRequest;
use Tool\User\Domain\Models\Spot\SpotRepository;
use Tool\User\Infrastructure\Eloquents\EloquentCategory;
use Tool\User\Infrastructure\Eloquents\EloquentCity;
use Tool\User\Infrastructure\Eloquents\EloquentPrefecture;

class IndexUseCase
{
    private EloquentCategory $eloquentCategory;
    private EloquentCity $eloquentCity;
    private EloquentPrefecture $eloquentPrefecture;
    private IndexRequest $request;
    private SpotRepository $spotRepo;

    public function __construct(
        EloquentCategory $eloquentCategory,
        EloquentCity $eloquentCity,
        EloquentPrefecture $eloquentPrefecture,
        IndexRequest $request,
        SpotRepository $spotRepo
    )
    {
        $this->eloquentCategory = $eloquentCategory;
        $this->eloquentCity = $eloquentCity;
        $this->eloquentPrefecture = $eloquentPrefecture;
        $this->request = $request;
        $this->spotRepo = $spotRepo;

    }

    public function __invoke(array $auth): array
    {
        $data = $this->spotRepo->list($auth);
        $data['category'] = $this->eloquentCategory->pluck('name', 'id');
        $data['cities'] = $this->eloquentCity->pluck('name', 'id');
        $data['prefectures'] = $this->eloquentPrefecture->pluck('name', 'id');
        $data['count'] = $this->spotRepo->count();

        return $data;
    }
}
