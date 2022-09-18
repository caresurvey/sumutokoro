<?php

namespace Tool\General\Application\UseCases\Spot;

use Tool\General\Domain\Models\Spot\SpotSearchRepository;
use Tool\General\Application\Requests\Spot\IndexRequest;
use Tool\General\Domain\Models\Spot\SpotRepository;
use Tool\General\Infrastructure\Eloquents\EloquentCategory;
use Tool\General\Infrastructure\Eloquents\EloquentCity;
use Tool\General\Infrastructure\Eloquents\EloquentPrefecture;

class IndexUseCase
{
    private EloquentCategory $eloquentCategory;
    private EloquentCity $eloquentCity;
    private EloquentPrefecture $eloquentPrefecture;
    private IndexRequest $request;
    private SpotRepository $spotRepo;
    private SpotSearchRepository $spotSearchRepo;

    public function __construct(
        EloquentCategory $eloquentCategory,
        EloquentCity $eloquentCity,
        EloquentPrefecture $eloquentPrefecture,
        IndexRequest $request,
        SpotRepository $spotRepo,
        SpotSearchRepository $spotSearchRepo
    )
    {
        $this->eloquentCategory = $eloquentCategory;
        $this->eloquentCity = $eloquentCity;
        $this->eloquentPrefecture = $eloquentPrefecture;
        $this->request = $request;
        $this->spotRepo = $spotRepo;
        $this->spotSearchRepo = $spotSearchRepo;
    }

    public function __invoke(): array
    {
        !empty($this->request->getQueryString()) ? $query = $this->request->getQueryString() : $query = '';
        $search = $this->spotSearchRepo->makeSearch($this->request->all(), $query);
        $data = $this->spotRepo->list($search);
        $data['categories'] = $this->eloquentCategory->pluck('name', 'id');
        $data['cities'] = $this->eloquentCity->pluck('name', 'id');
        $data['prefectures'] = $this->eloquentPrefecture->pluck('name', 'id');

        return $data;
    }
}
