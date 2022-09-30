<?php

namespace Tool\Admin\Application\UseCases\Download;

use Tool\Admin\Domain\Models\Spot\SpotRepository;

class SpotUseCase
{
    private SpotRepository $spotRepo;

    public function __construct(
        SpotRepository $spotRepo,
    )
    {
        $this->spotRepo = $spotRepo;
    }

    public function __invoke(): array
    {
        // データ取得
        return $this->spotRepo->download();
    }
}
