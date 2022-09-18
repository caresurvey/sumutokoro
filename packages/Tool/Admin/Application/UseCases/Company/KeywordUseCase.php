<?php

namespace Tool\Admin\Application\UseCases\Company;

use Tool\Admin\Application\Requests\Company\RelationalUserRequest;
use Tool\Admin\Domain\Models\Company\CompanyRepository;

class KeywordUseCase
{
    private RelationalUserRequest $request;
    private CompanyRepository $companyRepo;

    public function __construct(
        RelationalUserRequest $request,
        companyRepository $companyRepo,
    )
    {
        $this->request = $request;
        $this->companyRepo = $companyRepo;
    }

    public function __invoke(): array
    {
        // データを取得して返す
        return $this->companyRepo->keyword($this->request->all());
    }
}
