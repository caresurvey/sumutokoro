<?php

namespace Tool\General\Application\UseCases\News;

use Tool\General\Domain\Models\News\NewsRepository;

class DetailUseCase
{
    private NewsRepository $newsRepo;

    public function __construct(
        NewsRepository   $newsRepo,
    )
    {
        $this->newsRepo = $newsRepo;
    }

    public function __invoke(int $id): array
    {
        $data['news'] = $this->newsRepo->detail($id);

        return $data;
    }
}
