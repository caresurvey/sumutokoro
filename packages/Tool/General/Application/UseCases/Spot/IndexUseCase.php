<?php

namespace Tool\General\Application\UseCases\Spot;

use Tool\General\Domain\Models\AreaCenter\AreaCenterRepository;
use Tool\General\Domain\Models\Category\CategoryRepository;
use Tool\General\Domain\Models\City\CityRepository;
use Tool\General\Domain\Models\Prefecture\PrefectureRepository;
use Tool\General\Domain\Models\Spot\SpotSearchRepository;
use Tool\General\Application\Requests\Spot\IndexRequest;
use Tool\General\Domain\Models\Spot\SpotRepository;

class IndexUseCase
{
    private IndexRequest $request;
    private AreaCenterRepository $areaCenterRepo;
    private CategoryRepository $categoryRepo;
    private CityRepository $cityRepo;
    private PrefectureRepository $prefectureRepo;
    private SpotRepository $spotRepo;
    private SpotSearchRepository $spotSearchRepo;

    public function __construct(
        IndexRequest $request,
        AreaCenterRepository $areaCenterRepo,
        CategoryRepository $categoryRepo,
        CityRepository $cityRepo,
        PrefectureRepository $prefectureRepo,
        SpotRepository $spotRepo,
        SpotSearchRepository $spotSearchRepo
    )
    {
        $this->request = $request;
        $this->areaCenterRepo = $areaCenterRepo;
        $this->categoryRepo = $categoryRepo;
        $this->cityRepo = $cityRepo;
        $this->prefectureRepo = $prefectureRepo;
        $this->spotRepo = $spotRepo;
        $this->spotSearchRepo = $spotSearchRepo;
    }

    public function __invoke(): array
    {
        !empty($this->request->getQueryString()) ? $query = $this->request->getQueryString() : $query = '';
        $search = $this->spotSearchRepo->makeSearch($this->request->all(), $query);
        $data = $this->spotRepo->list($search);
        $data['search'] = $search;
        $data['area_centers'] = $this->areaCenterRepo->list();
        $data['categories'] = $this->categoryRepo->list();
        $data['cities'] = $this->cityRepo->list();
        $data['prefectures'] = $this->prefectureRepo->list();

        return $data;
    }
}
