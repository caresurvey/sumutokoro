<?php

namespace Tool\Admin\Application\UseCases\Book;

use Tool\Admin\Infrastructure\Eloquents\EloquentAreaSection;

class InputUseCase
{
    private EloquentAreaSection $eloquentAreaSection;

    public function __construct(
        EloquentAreaSection $eloquentAreaSection,
    )
    {
        $this->eloquentAreaSection = $eloquentAreaSection;
    }

    public function __invoke(): array
    {
        // 必要なデータを取得
        $area_sections = [];
        $pre_area_sections = $this->eloquentAreaSection->where('display', 1)->with('book')->orderBy('reorder', 'asc')->get();
        foreach($pre_area_sections as $pre_area_section) {
            $area_sections[$pre_area_section['id']] = $pre_area_section['name'] . '（' . $pre_area_section['book']['name'] .'）';
        }

        // データを配列にして返す
        return [
            'area_sections' => $area_sections
        ];
    }
}
