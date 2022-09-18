<?php

namespace Tool\Admin\Application\UseCases\News;

use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\News\NewsRepository;

class DeleteUseCase
{
    private NewsRepository $newsRepo;

    public function __construct(NewsRepository $newsRepo)
    {
        $this->newsRepo = $newsRepo;
    }

    public function __invoke(int $id, array $auth): LogicResponse
    {
        // 保存して結果を返す
        return $this->newsRepo->remove($id, $auth);
    }
}
