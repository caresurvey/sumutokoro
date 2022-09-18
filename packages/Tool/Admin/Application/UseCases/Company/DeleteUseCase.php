<?php

namespace Tool\Admin\Application\UseCases\Company;

use Tool\Admin\Application\Requests\Company\DestroyRequest;
use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\Company\CompanyRepository;

class DeleteUseCase
{
    private CompanyRepository $companyRepo;

    public function __construct(
        companyRepository $companyRepo,
    )
    {
        $this->companyRepo = $companyRepo;
    }

    public function __invoke(int $id, array $auth): LogicResponse
    {
        // 保存して結果を返す
        return $this->companyRepo->remove($id, $auth);
    }
}
