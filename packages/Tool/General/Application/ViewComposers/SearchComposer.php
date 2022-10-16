<?php

namespace Tool\General\Application\ViewComposers;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Illuminate\Support\Facades\Request;
use Tool\General\Infrastructure\Eloquents\EloquentArea;
use Tool\General\Infrastructure\Eloquents\EloquentAreaCenter;
use Tool\General\Application\Requests\Search\IndexRequest;
use Tool\General\Domain\Models\Spot\SpotRepository;
use Tool\General\Domain\Models\Spot\SpotSearchRepository;
use Tool\General\Infrastructure\Eloquents\EloquentCategory;
use Tool\General\Infrastructure\Eloquents\EloquentCity;
use Tool\General\Infrastructure\Eloquents\EloquentPriceRange;

class SearchComposer
{
    private EloquentArea $eloquentArea;
    private EloquentAreaCenter $eloquentAreaCenter;
    private EloquentCategory $eloquentCategory;
    private EloquentCity $eloquentCity;
    private EloquentPriceRange $eloquentPriceRange;
    private IndexRequest $request;
    private SpotRepository $spotRepo;
    private SpotSearchRepository $spotSearchRepo;

    public function __construct(
        EloquentArea         $eloquentArea,
        EloquentAreaCenter   $eloquentAreaCenter,
        EloquentCategory     $eloquentCategory,
        EloquentCity         $eloquentCity,
        EloquentPriceRange   $eloquentPriceRange,
        IndexRequest         $request,
        SpotRepository       $spotRepo,
        SpotSearchRepository $spotSearchRepo
    )
    {
        $this->eloquentArea = $eloquentArea;
        $this->eloquentAreaCenter = $eloquentAreaCenter;
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
        //キャッシュからデータを取得（なければキャッシュに保存）
        $results = Cache::rememberForever("search_areas", function () {
            $results = [];
            $area_centers = $this->eloquentAreaCenter
                ->where('display', 1)
                ->where('id', '<>', 1)
                ->select('id', 'label', 'area_id', 'area_section_id', 'city_id')
                ->with('area:id,label,area_label_id', 'area.area_label:id,label', 'city:id,name,label', 'area_section:id,name,reorder')
                ->withCount('spots')
                ->orderBy('reorder')
                ->get()
                ->toArray();
            foreach ($area_centers as $area_center) {
                if ($area_center['city_id'] === 2 || $area_center['city_id'] === 5) {
                    if (empty($results[$area_center['city']['name']]['data'][$area_center['area']['id']])) {
                        $results[$area_center['city']['name']]['data'][$area_center['area']['id']] = [
                            'id' => $area_center['area']['id'],
                            'name' => $area_center['area']['label'],
                            'spots_count' => 0,
                        ];
                    }
                    if (empty($results[$area_center['city']['name']]['spots_count'])) {
                        $results[$area_center['city']['name']]['spots_count'] = 0;
                        $results[$area_center['city']['name']]['type'] = 'area';
                    }
                    $results[$area_center['city']['name']]['data'][$area_center['area']['id']]['spots_count'] += $area_center['spots_count'];
                    $results[$area_center['city']['name']]['spots_count'] += $area_center['spots_count'];
                } else {
                    if ($area_center['area']['area_label']['label'] !== '') {
                        if (empty($results[$area_center['area']['area_label']['label']]['data'][$area_center['city_id']])) {
                            $results[$area_center['area']['area_label']['label']]['data'][$area_center['city_id']] = [
                                'id' => $area_center['city_id'],
                                'name' => $area_center['city']['label'],
                                'spots_count' => 0,
                            ];
                        }
                        if (empty($results[$area_center['area']['area_label']['label']]['spots_count'])) {
                            $results[$area_center['area']['area_label']['label']]['spots_count'] = 0;
                            $results[$area_center['area']['area_label']['label']]['type'] = 'city';
                        }
                        $results[$area_center['area']['area_label']['label']]['data'][$area_center['city_id']]['spots_count'] += $area_center['spots_count'];
                        $results[$area_center['area']['area_label']['label']]['spots_count'] += $area_center['spots_count'];
                    }
                }
            }
            return $results;
        });
        //dd($results);

        // データを返す
        return $results;
    }

    public function getCategories(): array
    {
        //キャッシュからデータを取得（なければキャッシュに保存）
        $data = Cache::rememberForever("search_categories", function () {
            return $this->eloquentCategory->where('display', 1)->where('public', 1)->withCount('spots')->orderBy('reorder', 'asc')->get();
        });

        // データを返す
        return $data->toArray();
    }

    public function getCities(): array
    {
        //キャッシュからデータを取得（なければキャッシュに保存）
        $data = Cache::rememberForever("search_cities", function () {
            return $this->eloquentCity->where('display', 1)->where('public', 1)->withCount('spots')->orderBy('reorder', 'asc')->get();
        });

        // データを返す
        return $data->toArray();
    }

    public function getPriceRanges(): array
    {
        //キャッシュからデータを取得（なければキャッシュに保存）
        $data = Cache::rememberForever("search_price_ranges", function () {
            return $this->eloquentPriceRange->where('display', 1)->where('public', 1)->withCount('spots')->orderBy('reorder', 'asc')->get();
        });

        // データを返す
        return $data->toArray();
    }
}