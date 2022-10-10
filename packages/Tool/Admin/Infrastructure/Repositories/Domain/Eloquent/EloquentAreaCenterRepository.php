<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Eloquent;

use Tool\Admin\Domain\Models\AreaCenter\AreaCenterRepository;
use Tool\Admin\Domain\Models\AreaCenter\Export;
use Tool\Admin\Infrastructure\Eloquents\EloquentAreaCenter;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\FormatConditions;
use DB;

class EloquentAreaCenterRepository implements AreaCenterRepository
{
    private EloquentAreaCenter $eloquentAreaCenter;

    public function __construct(
        EloquentAreaCenter $eloquentAreaCenter,
    )
    {
        $this->eloquentAreaCenter = $eloquentAreaCenter;
    }

    public function getBookData(int $area_section_id): array
    {
        // 中間テーブルから該当するSpotのIdをすべて取得
        $bookSections = $this->eloquentAreaCenter
            ->where('area_section_id', $area_section_id)
            ->orderBy('book_reorder', 'asc')
            ->with('area.area_label', 'spots:id,area_center_id', 'area_section.book')
            ->get();

        return $bookSections->all();
    }

    public function export(): Export
    {
        $data = $this->eloquentAreaCenter
            ->where('display', 1)
            ->where('id', '<>', 1)
            ->with('prefecture', 'city', 'area')
            ->orderBy('city_id', 'asc')
            ->get();
        return new Export($data);
    }
}
