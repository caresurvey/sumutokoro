<?php

namespace Tool\Admin\Application\UseCases\Company;

use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\Company\CompanyRepository;
use Tool\Admin\Application\Requests\Company\StoreRequest;

class StoreUseCase
{
    private StoreRequest $request;
    private CompanyRepository $companyRepo;

    public function __construct(
        StoreRequest $request,
        CompanyRepository $companyRepo,
    )
    {
        $this->request = $request;
        $this->companyRepo = $companyRepo;
    }

    public function __invoke(array $auth): LogicResponse
    {
        // 二重送信防止
        $this->request->session()->regenerateToken();

        // リクエスト形成
        $request = $this->request->data();
        $request['search_words'] = $this->request->getSearchWords();

        // 保存して結果を返す
        return $this->companyRepo->store($request, $auth);
    }
}
