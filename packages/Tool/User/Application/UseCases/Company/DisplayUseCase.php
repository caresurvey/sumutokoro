<?php

namespace Tool\User\Application\UseCases\Company;

use Tool\User\Domain\Models\Common\LogicResponse;
use Tool\User\Domain\Models\Company\CompanyRepository;

class DisplayUseCase
{
    private CompanyRepository $companyRepo;

    public function __construct(CompanyRepository $companyRepo)
    {
        $this->companyRepo = $companyRepo;
    }

    public function __invoke(int $id, array $auth): LogicResponse
    {
        // 表示を切り替えて結果を返す
        return $this->companyRepo->display($id, $auth);
    }
}
