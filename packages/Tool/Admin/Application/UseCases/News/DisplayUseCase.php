<?php

namespace Tool\Admin\Application\UseCases\News;

use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\News\NewsRepository;

class DisplayUseCase
{
    private NewsRepository $newsRepo;

    public function __construct(NewsRepository $newsRepo)
    {
        $this->newsRepo = $newsRepo;
    }

    public function __invoke(int $id, array $auth): LogicResponse
    {
        // 表示を切り替えて結果を返す
        return $this->newsRepo->display($id, $auth);
    }
}
