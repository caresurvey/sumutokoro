<?php

namespace Tool\Admin\Application\UseCases\Company;

use Tool\Admin\Domain\Models\Company\CompanyRepository;
use Tool\Admin\Domain\Models\Company\Export;

class ExportUseCase
{
    private CompanyRepository $companyRepo;

    public function __construct(
        CompanyRepository $companyRepo,
    )
    {
        $this->companyRepo = $companyRepo;
    }

    public function __invoke(): Export
    {
        // データ取得
        return $this->companyRepo->export();
    }
}
