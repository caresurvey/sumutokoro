<?php

namespace Tool\User\Application\UseCases\Spot;

use Tool\User\Domain\Models\Icon\IconRepository;
use Tool\User\Domain\Models\Spot\SpotRepository;
use Tool\User\Infrastructure\Eloquents\EloquentCategory;
use Tool\User\Infrastructure\Eloquents\EloquentCity;
use Tool\User\Infrastructure\Eloquents\EloquentPrefecture;
use Tool\User\Infrastructure\Eloquents\EloquentPriceRange;
use Tool\User\Infrastructure\Eloquents\EloquentSpotIconType;
use Tool\User\Infrastructure\Eloquents\EloquentSpace;

class EditUseCase
{
    private EloquentCategory $eloquentCategory;
    private EloquentCity $eloquentCity;
    private EloquentPrefecture $eloquentPrefecture;
    private EloquentPriceRange $eloquentPriceRange;
    private EloquentSpotIconType $eloquentSpotIconType;
    private EloquentSpace $eloquentSpace;
    private IconRepository $iconRepo;
    private SpotRepository $spotRepo;

    public function __construct(
        EloquentCategory $eloquentCategory,
        EloquentCity $eloquentCity,
        EloquentPrefecture $eloquentPrefecture,
        EloquentPriceRange $eloquentPriceRange,
        EloquentSpotIconType $eloquentSpotIconType,
        EloquentSpace $eloquentSpace,
        IconRepository $iconRepo,
        SpotRepository $spotRepo
    )
    {
        $this->eloquentCategory = $eloquentCategory;
        $this->eloquentCity = $eloquentCity;
        $this->eloquentPrefecture = $eloquentPrefecture;
        $this->eloquentPriceRange = $eloquentPriceRange;
        $this->eloquentSpace = $eloquentSpace;
        $this->eloquentSpotIconType = $eloquentSpotIconType;
        $this->iconRepo = $iconRepo;
        $this->spotRepo = $spotRepo;
    }

    public function __invoke(int $id, array $auth): array
    {
        // データを取得する
        $data['categories'] = $this->eloquentCategory->pluck('name', 'id')->toArray();
        $data['cities'] = $this->eloquentCity->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['prefectures'] = $this->eloquentPrefecture->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['price_ranges'] = $this->eloquentPriceRange->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['spaces'] = $this->eloquentSpace->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['spot'] = $this->spotRepo->edit($id, $auth);
        $data['spot_icon_types'] = $this->eloquentSpotIconType->get()->toArray();
        $data['icons'] = $this->iconRepo->makeEditData($id, $data['spot']['spot_icon_genre_comments']);
        $data['associatedCompany'] = ['id' => $data['spot']['company']['id'], 'name' => $data['spot']['company']['name']];
        (!empty($data['spot']['spot_main_image'])) ? $data['spotMainImage'] = $data['spot']['spot_main_image'] : $data['spotMainImage'] = [];
        $data['isSpotEdit'] = true;

        // 取得データを返す
        return $data;
    }
}
