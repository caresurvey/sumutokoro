<?php

namespace Tool\General\Application\ViewComposers;


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
            $search['categories'] = $this->eloquentCategory->where('display', 1)->where('public', 1)->withCount('spots')->orderBy('reorder', 'asc')->get();
            $search['cities'] = $this->eloquentCity->where('display', 1)->where('public', 1)->withCount('spots')->orderBy('reorder', 'asc')->get();
            $search['price_ranges'] = $this->eloquentPriceRange->where('display', 1)->where('public', 1)->withCount('spots')->orderBy('reorder', 'asc')->get();
            $search['count'] = $this->spotRepo->count();
            $search['query']['category'] = $searchObject->getCategory();
            $search['query']['city'] = $searchObject->getCity();
            $search['query']['price_range'] = $searchObject->getPriceRange();
            $search['query']['keyword'] = $searchObject->getKeyword();
        }

        // Viewにセット
        $view->with(compact('search'));
    }
}