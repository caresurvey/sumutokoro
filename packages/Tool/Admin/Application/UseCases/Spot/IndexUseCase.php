<?php

namespace Tool\Admin\Application\UseCases\Spot;

use Tool\Admin\Application\Requests\Spot\IndexRequest;
use Tool\Admin\Domain\Models\Spot\SpotRepository;
use Tool\Admin\Domain\Models\Spot\SpotSearchRepository;
use Tool\Admin\Infrastructure\Eloquents\EloquentAreaCenter;
use Tool\Admin\Infrastructure\Eloquents\EloquentCategory;
use Tool\Admin\Infrastructure\Eloquents\EloquentCity;
use Tool\Admin\Infrastructure\Eloquents\EloquentPrefecture;
use Tool\Admin\Infrastructure\Eloquents\EloquentPriceRange;

class IndexUseCase
{
    private EloquentAreaCenter $eloquentAreaCenter;
    private EloquentCategory $eloquentCategory;
    private EloquentCity $eloquentCity;
    private EloquentPrefecture $eloquentPrefecture;
    private EloquentPriceRange $eloquentPriceRange;
    private IndexRequest $request;
    private SpotRepository $spotRepo;
    private SpotSearchRepository $spotSearchRepo;

    public function __construct(
        EloquentAreaCenter $eloquentAreaCenter,
        EloquentCategory $eloquentCategory,
        EloquentCity $eloquentCity,
        EloquentPrefecture $eloquentPrefecture,
        EloquentPriceRange $eloquentPriceRange,
        IndexRequest $request,
        SpotRepository $spotRepo,
        SpotSearchRepository $spotSearchRepo
    )
    {
        $this->eloquentAreaCenter = $eloquentAreaCenter;
        $this->eloquentCategory = $eloquentCategory;
        $this->eloquentCity = $eloquentCity;
        $this->eloquentPrefecture = $eloquentPrefecture;
        $this->eloquentPriceRange = $eloquentPriceRange;
        $this->request = $request;
        $this->spotRepo = $spotRepo;
        $this->spotSearchRepo = $spotSearchRepo;

    }

    public function __invoke(array $auth): array
    {
        // データ取得
        !empty($this->request->getQueryString()) ? $query = $this->request->getQueryString() : $query = '';
        $search = $this->spotSearchRepo->makeSearch($this->request->all(), $query);
        $data = $this->spotRepo->list($search, $auth);
        $data['area_centers'] = $this->eloquentAreaCenter->where('display', 1)->withCount('spots')->orderBy('reorder', 'asc')->get();
        $data['categories'] = $this->eloquentCategory->where('display', 1)->where('public', 1)->withCount('spots')->orderBy('reorder', 'asc')->get();
        $data['cities'] = $this->eloquentCity->where('display', 1)->where('public', 1)->withCount('spots')->orderBy('reorder', 'asc')->get();
        $data['data_area_centers'] = $this->eloquentAreaCenter->pluck('label', 'id');
        $data['data_categories'] = $this->eloquentCategory->pluck('name', 'id');
        $data['data_cities'] = $this->eloquentCity->pluck('name', 'id');
        $data['data_prefectures'] = $this->eloquentPrefecture->pluck('name', 'id');
        $data['price_ranges'] = $this->eloquentPriceRange->where('display', 1)->where('public', 1)->withCount('spots')->orderBy('reorder', 'asc')->get();
        $data['query']['category'] = $search->getCategory();
        $data['query']['city'] = $search->getCity();
        $data['query']['price_range'] = $search->getPriceRange();
        $data['query']['keyword'] = $search->getKeyword();

        return $data;
    }
}
