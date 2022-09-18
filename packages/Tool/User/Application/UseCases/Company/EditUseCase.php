<?php

namespace Tool\User\Application\UseCases\Company;

use Tool\User\Domain\Models\Company\CompanyRepository;
use Tool\User\Infrastructure\Eloquents\EloquentCity;
use Tool\User\Infrastructure\Eloquents\EloquentPrefecture;

class EditUseCase
{
    private CompanyRepository $companyRepo;
    private EloquentCity $eloquentCity;
    private EloquentPrefecture $eloquentPrefecture;

    public function __construct(
        CompanyRepository  $companyRepo,
        EloquentCity       $eloquentCity,
        EloquentPrefecture $eloquentPrefecture
    )
    {
        $this->companyRepo = $companyRepo;
        $this->eloquentCity = $eloquentCity;
        $this->eloquentPrefecture = $eloquentPrefecture;
    }

    public function __invoke(int $id, array $auth): array
    {
        // データを取得する
        $data['company'] = $this->companyRepo->edit($id, $auth);
        $data['cities'] = $this->eloquentCity->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['prefectures'] = $this->eloquentPrefecture->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['isCompanyEdit'] = true;

        // 取得データを返す
        return $data;
    }
}
