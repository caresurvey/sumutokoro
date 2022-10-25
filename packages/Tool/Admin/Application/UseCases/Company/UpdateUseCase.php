<?php

namespace Tool\Admin\Application\UseCases\Company;

use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\Company\CompanyRepository;
use Tool\Admin\Application\Requests\Company\UpdateRequest;
use Tool\Admin\Infrastructure\Eloquents\EloquentCity;

class UpdateUseCase
{
    private EloquentCity $eloquentCity;
    private UpdateRequest $request;
    private CompanyRepository $companyRepo;

    public function __construct(
        EloquentCity $eloquentCity,
        UpdateRequest $request,
        CompanyRepository $companyRepo,
    )
    {
        $this->request = $request;
        $this->eloquentCity = $eloquentCity;
        $this->companyRepo = $companyRepo;
    }

    public function __invoke(array $auth): LogicResponse
    {
        // 二重送信防止
        $this->request->session()->regenerateToken();

        // データ取得
        $cities = $this->eloquentCity->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();

        // リクエスト形成
        $request = $this->request->all();
        $request['company']['search_words'] = $this->request->getSearchWords($request['company']['city_id'], $cities);

        // 保存して結果を返す
        return $this->companyRepo->update($request, $auth);
    }
}
