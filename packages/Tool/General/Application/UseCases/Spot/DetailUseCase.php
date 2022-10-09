<?php

namespace Tool\General\Application\UseCases\Spot;
use Tool\General\Domain\Models\Category\CategoryRepository;
use Tool\General\Domain\Models\City\CityRepository;
use Tool\General\Domain\Models\Icon\IconRepository;
use Tool\General\Domain\Models\Prefecture\PrefectureRepository;
use Tool\General\Domain\Models\Spot\SpotRepository;
use Tool\General\Infrastructure\Eloquents\EloquentSpotIconType;

class DetailUseCase
{
    private CategoryRepository $categoryRepo;
    private CityRepository $cityRepo;
    private PrefectureRepository $prefectureRepo;
    private EloquentSpotIconType $eloquentSpotIconType;
    private IconRepository $iconRepo;
    private SpotRepository $spotRepo;

    public function __construct(
        CategoryRepository $categoryRepo,
        CityRepository $cityRepo,
        EloquentSpotIconType $eloquentSpotIconType,
        PrefectureRepository $prefectureRepo,
        IconRepository $iconRepo,
        SpotRepository   $spotRepo
    )
    {
        $this->categoryRepo = $categoryRepo;
        $this->cityRepo = $cityRepo;
        $this->prefectureRepo = $prefectureRepo;
        $this->eloquentSpotIconType = $eloquentSpotIconType;
        $this->iconRepo = $iconRepo;
        $this->spotRepo = $spotRepo;
    }

    public function __invoke(int $id): array
    {
        $data['spot'] = $this->spotRepo->detail($id);
        $data['categories'] = $this->categoryRepo->list();
        $data['cities'] = $this->cityRepo->list();
        $data['prefectures'] = $this->prefectureRepo->list();
        $data['spot_icon_types'] = $this->eloquentSpotIconType->get()->toArray();
        $data['icons'] = $this->iconRepo->makeDetailData($id);

        return $data;
    }
}
