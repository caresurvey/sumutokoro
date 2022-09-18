<?php

namespace Tool\Admin\Application\UseCases\Spot;

use Tool\Admin\Domain\Models\Icon\IconRepository;
use Tool\Admin\Domain\Models\Spot\SpotRepository;
use Tool\Admin\Infrastructure\Eloquents\EloquentAreaBranch;
use Tool\Admin\Infrastructure\Eloquents\EloquentCategory;
use Tool\Admin\Infrastructure\Eloquents\EloquentCity;
use Tool\Admin\Infrastructure\Eloquents\EloquentPrefecture;
use Tool\Admin\Infrastructure\Eloquents\EloquentPriceRange;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpotIconType;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpace;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpotPlan;
use Tool\Admin\Infrastructure\Eloquents\EloquentTradeArea;

class EditUseCase
{
    private EloquentAreaBranch $eloquentAreaBranch;
    private EloquentCategory $eloquentCategory;
    private EloquentCity $eloquentCity;
    private EloquentPrefecture $eloquentPrefecture;
    private EloquentPriceRange $eloquentPriceRange;
    private EloquentSpotIconType $eloquentSpotIconType;
    private EloquentSpotPlan $eloquentSpotPlan;
    private EloquentSpace $eloquentSpace;
    private EloquentTradeArea $eloquentTradeArea;
    private IconRepository $iconRepo;
    private SpotRepository $spotRepo;

    public function __construct(
        EloquentAreaBranch $eloquentAreaBranch,
        EloquentCategory $eloquentCategory,
        EloquentCity $eloquentCity,
        EloquentPrefecture $eloquentPrefecture,
        EloquentPriceRange $eloquentPriceRange,
        EloquentSpotIconType $eloquentSpotIconType,
        EloquentSpotPlan $eloquentSpotPlan,
        EloquentSpace $eloquentSpace,
        EloquentTradeArea $eloquentTradeArea,
        IconRepository $iconRepo,
        SpotRepository $spotRepo
    )
    {
        $this->eloquentAreaBranch = $eloquentAreaBranch;
        $this->eloquentCategory = $eloquentCategory;
        $this->eloquentCity = $eloquentCity;
        $this->eloquentPrefecture = $eloquentPrefecture;
        $this->eloquentPriceRange = $eloquentPriceRange;
        $this->eloquentSpace = $eloquentSpace;
        $this->eloquentSpotIconType = $eloquentSpotIconType;
        $this->eloquentSpotPlan = $eloquentSpotPlan;
        $this->eloquentTradeArea = $eloquentTradeArea;
        $this->iconRepo = $iconRepo;
        $this->spotRepo = $spotRepo;
    }

    public function __invoke(int $id, array $auth): array
    {
        // データを取得する
        $data['area_branches'] = $this->eloquentAreaBranch->pluck('name', 'id')->toArray();
        $data['categories'] = $this->eloquentCategory->pluck('name', 'id')->toArray();
        $data['cities'] = $this->eloquentCity->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['prefectures'] = $this->eloquentPrefecture->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['price_ranges'] = $this->eloquentPriceRange->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['spot_plans'] = $this->eloquentSpotPlan->where('display', 1)->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['spaces'] = $this->eloquentSpace->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['spot'] = $this->spotRepo->edit($id, $auth);
        $data['spot_icon_types'] = $this->eloquentSpotIconType->get()->toArray();
        $data['trade_areas'] = $this->eloquentTradeArea->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['icons'] = $this->iconRepo->makeEditData($id, $data['spot']['spot_icon_genre_comments']);
        $data['associatedCompany'] = ['id' => $data['spot']['company']['id'], 'name' => $data['spot']['company']['name']];
        (!empty($data['spot']['spot_main_image'])) ? $data['spotMainImage'] = $data['spot']['spot_main_image'] : $data['spotMainImage'] = [];
        $data['isSpotEdit'] = true;

        // 取得データを返す
        return $data;
    }
}
