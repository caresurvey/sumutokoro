<?php

namespace Tool\Admin\Application\UseCases\Download;

use Tool\Admin\Domain\Models\Company\CompanyRepository;

class CompanyUseCase
{
    private CompanyRepository $companyRepo;

    public function __construct(
        CompanyRepository $companyRepo,
    )
    {
        $this->companyRepo = $companyRepo;
    }

    public function __invoke(): array
    {
        // データ取得
        return $this->companyRepo->download();
    }
}
