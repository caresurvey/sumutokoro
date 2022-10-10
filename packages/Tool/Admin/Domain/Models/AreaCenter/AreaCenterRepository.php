<?php

namespace Tool\Admin\Domain\Models\AreaCenter;

interface AreaCenterRepository
{
    public function getBookData(int $area_section_id): array;

    public function export(): Export;
}
