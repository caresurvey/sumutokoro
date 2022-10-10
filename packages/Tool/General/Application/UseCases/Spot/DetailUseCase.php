<?php

namespace Tool\General\Application\UseCases\Spot;
use Tool\General\Domain\Models\Category\CategoryRepository;
use Tool\General\Domain\Models\City\CityRepository;
use Tool\General\Domain\Models\Icon\IconRepository;
use Tool\General\Domain\Models\Prefecture\PrefectureRepository;
use Tool\General\Domain\Models\Spot\SpotRepository;
use Tool\General\Domain\Models\SpotIconType\SpotIconTypeRepository;

class DetailUseCase
{
    private CategoryRepository $categoryRepo;
    private CityRepository $cityRepo;
    private PrefectureRepository $prefectureRepo;
    private IconRepository $iconRepo;
    private SpotRepository $spotRepo;
    private SpotIconTypeRepository $spotIconTypeRepo;

    public function __construct(
        CategoryRepository $categoryRepo,
        CityRepository $cityRepo,
        PrefectureRepository $prefectureRepo,
        IconRepository $iconRepo,
        SpotRepository   $spotRepo,
        SpotIconTypeRepository   $spotIconTypeRepo
    )
    {
        $this->categoryRepo = $categoryRepo;
        $this->cityRepo = $cityRepo;
        $this->prefectureRepo = $prefectureRepo;
        $this->iconRepo = $iconRepo;
        $this->spotRepo = $spotRepo;
        $this->spotIconTypeRepo = $spotIconTypeRepo;
    }

    public function __invoke(int $id): array
    {
        $data['spot'] = $this->spotRepo->detail($id);
        $data['categories'] = $this->categoryRepo->list();
        $data['cities'] = $this->cityRepo->list();
        $data['prefectures'] = $this->prefectureRepo->list();
        $data['spot_icon_types'] = $this->spotIconTypeRepo->list();
        $data['icons'] = $this->iconRepo->makeDetailData($id);

        return $data;
    }
}
