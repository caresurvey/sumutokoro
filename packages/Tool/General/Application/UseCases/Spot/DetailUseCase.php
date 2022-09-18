<?php

namespace Tool\General\Application\UseCases\Spot;


use Tool\General\Domain\Models\Icon\IconRepository;
use Tool\General\Domain\Models\Spot\SpotRepository;
use Tool\General\Infrastructure\Eloquents\EloquentCategory;
use Tool\General\Infrastructure\Eloquents\EloquentCity;
use Tool\General\Infrastructure\Eloquents\EloquentPrefecture;
use Tool\General\Infrastructure\Eloquents\EloquentSpotIconType;

class DetailUseCase
{
    private EloquentCategory $eloquentCategory;
    private EloquentCity $eloquentCity;
    private EloquentPrefecture $eloquentPrefecture;
    private EloquentSpotIconType $eloquentSpotIconType;
    private IconRepository $iconRepo;
    private SpotRepository $spotRepo;

    public function __construct(
        EloquentCategory $eloquentCategory,
        EloquentCity $eloquentCity,
        EloquentPrefecture $eloquentPrefecture,
        EloquentSpotIconType $eloquentSpotIconType,
        IconRepository $iconRepo,
        SpotRepository   $spotRepo
    )
    {
        $this->eloquentCategory = $eloquentCategory;
        $this->eloquentCity = $eloquentCity;
        $this->eloquentPrefecture = $eloquentPrefecture;
        $this->eloquentSpotIconType = $eloquentSpotIconType;
        $this->iconRepo = $iconRepo;
        $this->spotRepo = $spotRepo;
    }

    public function __invoke(int $id): array
    {
        $data['spot'] = $this->spotRepo->detail($id);
        $data['categories'] = $this->eloquentCategory->pluck('name', 'id');
        $data['prefectures'] = $this->eloquentPrefecture->pluck('name', 'id');
        $data['cities'] = $this->eloquentCity->pluck('name', 'id');
        $data['spot_icon_types'] = $this->eloquentSpotIconType->get()->toArray();
        $data['icons'] = $this->iconRepo->makeDetailData($id);

        return $data;
    }
}
