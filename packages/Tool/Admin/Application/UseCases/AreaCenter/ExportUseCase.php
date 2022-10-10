<?php

namespace Tool\Admin\Application\UseCases\AreaCenter;

use Tool\Admin\Domain\Models\AreaCenter\AreaCenterRepository;
use Tool\Admin\Domain\Models\AreaCenter\Export;

class ExportUseCase
{
    private AreaCenterRepository $area_centerRepo;

    public function __construct(
        AreaCenterRepository $area_centerRepo,
    )
    {
        $this->area_centerRepo = $area_centerRepo;
    }

    public function __invoke(): Export
    {
        // データ取得
        return $this->area_centerRepo->export();
    }
}
