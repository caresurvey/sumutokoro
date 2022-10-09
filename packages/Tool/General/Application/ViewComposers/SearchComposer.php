<?php

namespace Tool\General\Application\ViewComposers;


use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Illuminate\Support\Facades\Request;
use Tool\General\Application\Requests\Search\IndexRequest;
use Tool\General\Domain\Models\Spot\SpotRepository;
use Tool\General\Domain\Models\Spot\SpotSearchRepository;
use Tool\General\Infrastructure\Eloquents\EloquentCategory;
use Tool\General\Infrastructure\Eloquents\EloquentCity;
use Tool\General\Infrastructure\Eloquents\EloquentPriceRange;

class SearchComposer
{
    private EloquentCategory $eloquentCategory;
    private EloquentCity $eloquentCity;
    private EloquentPriceRange $eloquentPriceRange;
    private IndexRequest $request;
    private SpotRepository $spotRepo;
    private SpotSearchRepository $spotSearchRepo;

    public function __construct(
        EloquentCategory $eloquentCategory,
        EloquentCity $eloquentCity,
        EloquentPriceRange $eloquentPriceRange,
        IndexRequest $request,
        SpotRepository $spotRepo,
        SpotSearchRepository $spotSearchRepo
    )
    {
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
        if(!empty(Request::route())) {
            if(Request::route()->getPrefix() === 'admin') {
                $isAdmin = true;
            }
        }

        // 検索オブジェクトを作成
        !empty($this->request->getQueryString()) ? $query = $this->request->getQueryString() : $query = '';
        $searchObject = $this->spotSearchRepo->makeSearch($this->request->all(), $query);

        // prefixがadminじゃなければ共通検索を行う
        if(!$isAdmin) {
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