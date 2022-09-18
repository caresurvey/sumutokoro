<?php

namespace Tool\General\Application\UseCases\News;

use Tool\General\Domain\Models\News\NewsRepository;

class IndexUseCase
{
    private NewsRepository $newsRepo;

    public function __construct(
        NewsRepository $newsRepo
    )
    {
        $this->newsRepo = $newsRepo;
    }

    public function __invoke(): array
    {
        return $this->newsRepo->list();
    }
}
