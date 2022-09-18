<?php

namespace Tool\Admin\Application\UseCases\Company;

use Tool\Admin\Application\Requests\Company\IndexRequest;
use Tool\Admin\Domain\Models\Company\CompanyRepository;
use Tool\Admin\Domain\Models\Company\CompanySearchRepository;
use Tool\Admin\Infrastructure\Eloquents\EloquentCity;
use Tool\Admin\Infrastructure\Eloquents\EloquentPrefecture;

class IndexUseCase
{
    private EloquentCity $eloquentCity;
    private EloquentPrefecture $eloquentPrefecture;
    private IndexRequest $request;
    private CompanyRepository $companyRepo;
    private CompanySearchRepository $companySearchRepo;

    public function __construct(
        EloquentCity $eloquentCity,
        EloquentPrefecture $eloquentPrefecture,
        IndexRequest $request,
        CompanyRepository $companyRepo,
        CompanySearchRepository $companySearchRepo
    )
    {
        $this->companyRepo = $companyRepo;
        $this->companySearchRepo = $companySearchRepo;
        $this->eloquentCity = $eloquentCity;
        $this->eloquentPrefecture = $eloquentPrefecture;
        $this->request = $request;
    }

    /**
     * @param array $auth
     * @return array
     */
    public function __invoke(array $auth): array
    {
        !empty($this->request->getQueryString()) ? $query = $this->request->getQueryString() : $query = '';
        $search = $this->companySearchRepo->makeSearch($this->request->all(), $query);
        $data = $this->companyRepo->list($search, $auth);
        $data['cities'] = $this->eloquentCity->where('display', 1)->where('public', 1)->withCount('companies')->orderBy('reorder', 'asc')->get();
        $data['data_cities'] = $this->eloquentCity->pluck('name', 'id');
        $data['data_prefectures'] = $this->eloquentPrefecture->pluck('name', 'id');
        $data['query']['city'] = $search->getCity();
        $data['query']['keyword'] = $search->getKeyword();

        return $data;
    }
}
