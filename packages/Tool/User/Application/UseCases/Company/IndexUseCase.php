<?php

namespace Tool\User\Application\UseCases\Company;

use Tool\User\Domain\Models\Company\CompanyRepository;
use Tool\User\Infrastructure\Eloquents\EloquentCity;

class IndexUseCase
{
    private EloquentCity $eloquentCity;
    private CompanyRepository $companyRepo;

    public function __construct(
        EloquentCity $eloquentCity,
        CompanyRepository $companyRepo,
    )
    {
        $this->companyRepo = $companyRepo;
        $this->eloquentCity = $eloquentCity;
    }

    public function __invoke(array $auth): array
    {
        $data = $this->companyRepo->list($auth);
        $data['cities'] = $this->eloquentCity->pluck('name', 'id');
        $data['count'] = $this->companyRepo->count();

        return $data;
    }
}
