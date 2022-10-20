<?php

namespace Tool\General\Application\ViewComposers;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Illuminate\Support\Facades\Request;
use Tool\General\Infrastructure\Eloquents\EloquentArea;
use Tool\General\Application\Requests\Search\IndexRequest;
use Tool\General\Domain\Models\Spot\SpotRepository;
use Tool\General\Domain\Models\Spot\SpotSearchRepository;
use Tool\General\Infrastructure\Eloquents\EloquentAreaSection;
use Tool\General\Infrastructure\Eloquents\EloquentCategory;
use Tool\General\Infrastructure\Eloquents\EloquentCity;
use Tool\General\Infrastructure\Eloquents\EloquentPriceRange;

class SearchComposer
{
    private EloquentArea $eloquentArea;
    private EloquentAreaSection $eloquentAreaSection;
    private EloquentCategory $eloquentCategory;
    private EloquentCity $eloquentCity;
    private EloquentPriceRange $eloquentPriceRange;
    private IndexRequest $request;
    private SpotRepository $spotRepo;
    private SpotSearchRepository $spotSearchRepo;

    public function __construct(
        EloquentArea         $eloquentArea,
        EloquentAreaSection   $eloquentAreaSection,
        EloquentCategory     $eloquentCategory,
        EloquentCity         $eloquentCity,
        EloquentPriceRange   $eloquentPriceRange,
        IndexRequest         $request,
        SpotRepository       $spotRepo,
        SpotSearchRepository $spotSearchRepo
    )
    {
        $this->eloquentArea = $eloquentArea;
        $this->eloquentAreaSection = $eloquentAreaSection;
        $this->eloquentCategory = $eloquentCategory;
        $this->eloquentCity = $eloquentCity;
        $this->eloquentPriceRange = $eloquentPriceRange;
        $this->request = $request;
        $this->spotRepo = $spotRepo;
        $this->spotSearchRepo = $spotSearchRepo;
    }

    /**
     * Bind data to the view.
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        // 初期化
        $search = [];

        // 管理画面かどうか
        $isAdmin = false;

        // prefixがadminならフラグをON
        if (!empty(Request::route())) {
            if (Request::route()->getPrefix() === 'admin') {
                $isAdmin = true;
            }
        }

        // 検索オブジェクトを作成
        !empty($this->request->getQueryString()) ? $query = $this->request->getQueryString() : $query = '';
        $searchObject = $this->spotSearchRepo->makeSearch($this->request->all(), $query);

        // prefixがadminじゃなければ共通検索を行う
        if (!$isAdmin) {
            $search['areas'] = $this->getAreas();
            $search['categories'] = $this->getCategories();
            $search['cities'] = $this->getCities();
            $search['price_ranges'] = $this->getPriceRanges();
            $search['count'] = $this->spotRepo->count();
            $search['query']['category'] = $searchObject->getCategory();
            $search['query']['city'] = $searchObject->getCity();
            $search['query']['price_range'] = $searchObject->getPriceRange();
            $search['query']['keyword'] = $searchObject->getKeyword();
        }

        // Viewにセット
        $view->with(compact('search'));
    }

    public function getAreas(): array
    {
        $results['area_sapporo'] = $this->getAreaSapporo();
        $results['area_asahikawa'] = $this->getAreaAsahikawa();
        $results['area_douo'] = $this->getAreaDouo();
        $results['area_dohoku'] = $this->getAreaDohoku();
        $results['area_doto'] = $this->getAreaDoto();
        $results['area_donan'] = $this->getAreaDonan();

        return $results;
    }

    public function getAreaSapporo(): array
    {
        // 初期化
        $results['count'] = 0;
        $results['data'] = [];
        $results['model'] = 'area';
        $results['models'] = 'areas';
        $results['name'] = '札幌エリア';

        // データ取得
        $areas = $this->eloquentArea
            ->where('display', 1)
            ->where('area_section_id', 4)
            ->select('id','name', 'label',  'display', 'area_section_id', 'city_id', 'prefecture_id')
            ->with([
                'area_center' => function($query){
                    $query->select('id', 'label','area_id', 'area_section_id', 'city_id');
                    $query->withCount(['spots' => function($query){
                        $query->where('display', 1);
                    }]);
                }
            ])
            ->get();

        // データ整形
        foreach($areas as $area) {
            $data = $area->toArray();
            $data['spots_count'] = 0;
            if(!empty($area['area_center']['spots_count'])) {
                $results['count'] += $area['area_center']['spots_count'];
                $data['spots_count'] = $data['area_center']['spots_count'];
            }
            $results['data'][] = $data;
        }

        return $results;
    }

    public function getAreaAsahikawa(): array
    {
        // 初期化
        $results['count'] = 0;
        $results['data'] = [];
        $results['model'] = 'area';
        $results['models'] = 'areas';
        $results['name'] = '旭川エリア';

        // データ取得
        $areas = $this->eloquentArea
            ->where('display', 1)
            ->where('area_section_id', 2)
            ->select('id','name', 'label',  'display', 'area_section_id', 'city_id', 'prefecture_id')
            ->with([
                'area_center' => function($query){
                    $query->select('id', 'label','area_id', 'area_section_id', 'city_id');
                    $query->withCount(['spots' => function($query){
                        $query->where('display', 1);
                    }]);
                }
            ])
            ->get();

        // データ整形
        foreach($areas as $area) {
            $data = $area->toArray();
            $data['spots_count'] = 0;
            if(!empty($area['area_center']['spots_count'])) {
                $results['count'] += $area['area_center']['spots_count'];
                $data['spots_count'] = $data['area_center']['spots_count'];
            }
            $results['data'][] = $data;
        }

        return $results;
    }

    public function getAreaDouo(): array
    {
        // 初期化
        $results['name'] = '道央エリア';
        $results['model'] = 'city';
        $results['models'] = 'cities';

        // area_sectionから、city_idを取得する
        $cityIds = $this->getAreaSectionCityIds(5);

        $results['data'] = $this->eloquentCity
            ->whereIn('id', $cityIds)
            ->where('display', 1)
                ->withCount(['spots' => function($query){
                    $query->where('display', 1);
                }])
            ->get()->toArray();

        $results['count'] = $this->getCount($results['data']);

        return $results;
    }

    public function getAreaDohoku(): array
    {
        // 初期化
        $results['name'] = '道北エリア';
        $results['model'] = 'city';
        $results['models'] = 'cities';

        // area_sectionから、city_idを取得する
        $cityIds = $this->getAreaSectionCityIds(3);

        $results['data'] = $this->eloquentCity
            ->whereIn('id', $cityIds)
            ->where('display', 1)
                ->withCount(['spots' => function($query){
                    $query->where('display', 1);
                }])
            ->get()->toArray();

        $results['count'] = $this->getCount($results['data']);

        return $results;
    }

    public function getAreaDoto(): array
    {
        // 初期化
        $results['name'] = '道東エリア';
        $results['model'] = 'city';
        $results['models'] = 'cities';

        // area_sectionから、city_idを取得する
        $cityIds = $this->getAreaSectionCityIds(6);

        $results['data'] = $this->eloquentCity
            ->whereIn('id', $cityIds)
            ->where('display', 1)
                ->withCount(['spots' => function($query){
                    $query->where('display', 1);
                }])
            ->get()->toArray();

        $results['count'] = $this->getCount($results['data']);

        return $results;
    }

    public function getAreaDonan(): array
    {
        //キャッシュからデータを取得（なければキャッシュに保存）
        //$results = Cache::rememberForever("search_areas", function () {
            // 初期化
            $results['name'] = '道南エリア';
            $results['model'] = 'city';
            $results['models'] = 'cities';

            // area_sectionから、city_idを取得する
            $cityIds = $this->getAreaSectionCityIds(7);

            $results['data'] = $this->eloquentCity
                ->whereIn('id', $cityIds)
                ->where('display', 1)
                ->withCount(['spots' => function($query){
                    $query->where('display', 1);
                }])
                ->get()->toArray();

            $results['count'] = $this->getCount($results['data']);


          //  return $results;
        //});

        // データを返す
        return $results;
    }

    /**
     * area_sectionから、city_idを取得する
     * @param int $section_id
     * @return array
     */
    public function getAreaSectionCityIds(int $section_id): array
    {
        // データ取得
        $area_sections = $this->eloquentAreaSection
            ->where('id', $section_id)
            ->where('display', 1)
            ->with('area_centers')
            ->get()->toArray();

        $pre_cities = [];
        foreach($area_sections as $area_section) {
            foreach($area_section['area_centers'] as $area_center) {
                $pre_cities[] = $area_center['city_id'];
            }
        }
        // 配列の重複を排除する
        return array_unique($pre_cities, true);
    }

    public function getCount(array $datas): int
    {
        $count = 0;
        foreach($datas as $data) {
            $count += $data['spots_count'];
        }

        return $count;
    }

    public function getCategories(): array
    {
        //キャッシュからデータを取得（なければキャッシュに保存）
        $data = Cache::rememberForever("search_categories", function () {
            return $this->eloquentCategory
                ->where('display', 1)
                ->where('public', 1)
                ->withCount(['spots' => function($query){
                    $query->where('display', 1);
                }])
                ->orderBy('reorder', 'asc')
                ->get();
        });

        // データを返す
        return $data->toArray();
    }

    public function getCities(): array
    {
        //キャッシュからデータを取得（なければキャッシュに保存）
        $data = Cache::rememberForever("search_cities", function () {
            return $this->eloquentCity
                ->where('display', 1)
                ->where('public', 1)
                ->withCount(['spots' => function($query){
                    $query->where('display', 1);
                }])
                ->orderBy('reorder', 'asc')
                ->get();
        });

        // データを返す
        return $data->toArray();
    }

    public function getPriceRanges(): array
    {
        //キャッシュからデータを取得（なければキャッシュに保存）
        $data = Cache::rememberForever("search_price_ranges", function () {
            return $this->eloquentPriceRange
                ->where('display', 1)
                ->where('public', 1)
                ->withCount(['spots' => function($query){
                    $query->where('display', 1);
                }])
                ->orderBy('reorder', 'asc')
                ->get();
        });

        // データを返す
        return $data->toArray();
    }
}