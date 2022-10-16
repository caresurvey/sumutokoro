<?php

namespace Tool\Admin\Application\UseCases\Spot;

use Tool\Admin\Domain\Models\Icon\IconRepository;
use Tool\Admin\Domain\Models\Spot\SpotRepository;
use Tool\Admin\Domain\Models\SpotIconGenreComment\SpotIconGenreCommentRepository;
use Tool\Admin\Infrastructure\Eloquents\EloquentAreaCenter;
use Tool\Admin\Infrastructure\Eloquents\EloquentBook;
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
    private EloquentAreaCenter $eloquentAreaCenter;
    private EloquentBook $eloquentBook;
    private EloquentCategory $eloquentCategory;
    private EloquentCity $eloquentCity;
    private EloquentPrefecture $eloquentPrefecture;
    private EloquentPriceRange $eloquentPriceRange;
    private EloquentSpotIconType $eloquentSpotIconType;
    private EloquentSpotPlan $eloquentSpotPlan;
    private EloquentSpace $eloquentSpace;
    private EloquentTradeArea $eloquentTradeArea;
    private IconRepository $iconRepo;
    private SpotIconGenreCommentRepository $iconGenreCommentRepo;
    private SpotRepository $spotRepo;

    public function __construct(
        EloquentAreaCenter $eloquentAreaCenter,
        EloquentBook $eloquentBook,
        EloquentCategory $eloquentCategory,
        EloquentCity $eloquentCity,
        EloquentPrefecture $eloquentPrefecture,
        EloquentPriceRange $eloquentPriceRange,
        EloquentSpotIconType $eloquentSpotIconType,
        EloquentSpotPlan $eloquentSpotPlan,
        EloquentSpace $eloquentSpace,
        EloquentTradeArea $eloquentTradeArea,
        IconRepository $iconRepo,
        SpotIconGenreCommentRepository $iconGenreCommentRepo,
        SpotRepository $spotRepo
    )
    {
        $this->eloquentAreaCenter = $eloquentAreaCenter;
        $this->eloquentBook = $eloquentBook;
        $this->eloquentCategory = $eloquentCategory;
        $this->eloquentCity = $eloquentCity;
        $this->eloquentPrefecture = $eloquentPrefecture;
        $this->eloquentPriceRange = $eloquentPriceRange;
        $this->eloquentSpace = $eloquentSpace;
        $this->eloquentSpotIconType = $eloquentSpotIconType;
        $this->eloquentSpotPlan = $eloquentSpotPlan;
        $this->eloquentTradeArea = $eloquentTradeArea;
        $this->iconRepo = $iconRepo;
        $this->iconGenreCommentRepo = $iconGenreCommentRepo;
        $this->spotRepo = $spotRepo;
    }

    public function __invoke(int $id, array $auth): array
    {
        // データを取得する
        $data['books'] = $this->eloquentBook->where('display', 1)->pluck('name', 'id')->toArray();
        $data['categories'] = $this->eloquentCategory->pluck('name', 'id')->toArray();
        $data['cities'] = $this->eloquentCity->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['prefectures'] = $this->eloquentPrefecture->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['price_ranges'] = $this->eloquentPriceRange->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['spot_plans'] = $this->eloquentSpotPlan->where('display', 1)->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['spaces'] = $this->eloquentSpace->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['spot'] = $this->spotRepo->edit($id, $auth);
        $data['spot_icon_types'] = $this->eloquentSpotIconType->get()->toArray();
        $data['trade_areas'] = $this->eloquentTradeArea->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['icons_genre_comments'] = $this->iconGenreCommentRepo->makeEditData($id, $data['spot']['spot_icon_genre_comments']);
        $data['icons'] = $this->iconRepo->makeEditData($id, $data['spot']['spot_icon_genre_comments']);
        $data['associatedCompany'] = ['id' => $data['spot']['company']['id'], 'name' => $data['spot']['company']['name']];
        $data['area_centers'] = $this->eloquentAreaCenter->pluck('label', 'id')->toArray();
        (!empty($data['spot']['spot_main_image'])) ? $data['spotMainImage'] = $data['spot']['spot_main_image'] : $data['spotMainImage'] = [];
        $data['isSpotEdit'] = true;

        // 取得データを返す
        return $data;
    }
}
