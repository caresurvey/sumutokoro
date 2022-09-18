<?php

namespace Tool\Admin\Application\UseCases\News;

use Tool\Admin\Domain\Models\News\NewsRepository;

class EditUseCase
{
    private NewsRepository $newsRepo;

    public function __construct(NewsRepository $newsRepo)
    {
        $this->newsRepo = $newsRepo;
    }

    public function __invoke(int $id, array $auth): array
    {
        // データを取得する
        $data['news'] = $this->newsRepo->edit($id, $auth);

        // 取得データを返す
        return $data;
    }
}
