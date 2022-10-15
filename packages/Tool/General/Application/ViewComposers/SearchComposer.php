<?php

namespace Tool\General\Application\ViewComposers;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Illuminate\Support\Facades\Request;
use Tool\General\Infrastructure\Eloquents\EloquentArea;
use Tool\General\Application\Requests\Search\IndexRequest;
use Tool\General\Domain\Models\Spot\SpotRepository;
use Tool\General\Domain\Models\Spot\SpotSearchRepository;
use Tool\General\Infrastructure\Eloquents\EloquentCategory;
use Tool\General\Infrastructure\Eloquents\EloquentCity;
use Tool\General\Infrastructure\Eloquents\EloquentPriceRange;

class SearchComposer
{
    private EloquentArea $eloquentArea;
    private EloquentCategory $eloquentCategory;
    private EloquentCity $eloquentCity;
    private EloquentPriceRange $eloquentPriceRange;
    private IndexRequest $request;
    private SpotRepository $spotRepo;
    private SpotSearchRepository $spotSearchRepo;

    public function __construct(
        EloquentArea         $eloquentArea,
        EloquentCategory     $eloquentCategory,
        EloquentCity         $eloquentCity,
        EloquentPriceRange   $eloquentPriceRange,
        IndexRequest         $request,
        SpotRepository       $spotRepo,
        SpotSearchRepository $spotSearchRepo
    )
    {
        $this->eloquentArea = $eloquentArea;
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
            $areas = $this->eloquentArea->where('display', 1)->with('area_label', 'area_section')->get()->toArray();
            foreach ($areas as $area) {
                if ($area['id'] !== 1) {
                    $result['id'] = $area['id'];
                    $result['name'] = $area['name'];
                    $result['area_label_id'] = $area['area_label_id'];
                    $result['area_section_id'] = $area['area_section_id'];
                    $results[$area['area_section']['name']][] = $result;
                }
            }

            return $results;
        });

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