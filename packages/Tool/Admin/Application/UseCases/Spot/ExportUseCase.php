<?php

namespace Tool\Admin\Application\UseCases\Spot;

use Tool\Admin\Domain\Models\Spot\Export\ExportGeneral;
use Tool\Admin\Domain\Models\Spot\SpotRepository;

class ExportUseCase
{
    private SpotRepository $spotRepo;

    public function __construct(
        SpotRepository $spotRepo,
    )
    {
        $this->spotRepo = $spotRepo;
    }

    public function __invoke(): ExportGeneral
    {
        // データ取得
        return $this->spotRepo->export();
    }
}
