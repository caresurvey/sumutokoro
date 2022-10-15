<?php

namespace Tool\Admin\Application\UseCases\News;

use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\News\NewsRepository;
use Tool\Admin\Application\Requests\News\StoreRequest;

class StoreUseCase
{
    private StoreRequest $request;
    private NewsRepository $newsRepo;

    public function __construct(
        StoreRequest $request,
        NewsRepository $newsRepo,
    )
    {
        $this->request = $request;
        $this->newsRepo = $newsRepo;
    }

    public function __invoke(array $auth): LogicResponse
    {
        // 二重送信防止
        $this->request->session()->regenerateToken();

        // 保存して結果を返す
        return $this->newsRepo->store($this->request->data(), $auth);
    }
}
