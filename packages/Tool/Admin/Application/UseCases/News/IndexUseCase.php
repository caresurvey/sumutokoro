<?php

namespace Tool\Admin\Application\UseCases\News;

use Tool\Admin\Domain\Models\News\NewsRepository;

class IndexUseCase
{
    private NewsRepository $newsRepo;

    public function __construct(
        NewsRepository $newsRepo
    )
    {
        $this->newsRepo = $newsRepo;
    }

    public function __invoke(array $auth): array
    {
        $data = $this->newsRepo->list();
        $data['count'] = $this->newsRepo->count();

        return $data;
    }
}
