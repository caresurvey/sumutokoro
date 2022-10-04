<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Publish;

use Tool\Admin\Domain\Models\Book\BookRepository;
use Tool\Admin\Infrastructure\Eloquents\EloquentAreaSection;
use Tool\Admin\Infrastructure\Eloquents\EloquentBook;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\FormatConditions;
use Tool\Common\Domain\Models\Book\Publish\Format\PublishFormat;
use DB;

class PublishBookRepository implements BookRepository
{
    private EloquentAreaSection $eloquentAreaSection;
    private EloquentBook $eloquentBook;

    public function __construct(
        EloquentAreaSection $eloquentAreaSection,
        EloquentBook $eloquentBook,
    )
    {
        $this->eloquentAreaSection = $eloquentAreaSection;
        $this->eloquentBook = $eloquentBook;
    }

    public function getDataByAreaSection(FormatConditions $conditions): array
    {
        // area_sectionデータを取得
        $area_section = $this->eloquentAreaSection->where('id', $conditions->getAreaSectionId())->first();

        // area_sectionデータを元にbookデータを取得
        return $this->eloquentBook->where('id', $area_section['book_id'])->first()->toArray();
    }

    public function makeFormatConditions(array $conditions): FormatConditions
    {
        // リクエストを元にFormatConditionsモデルを作成
        return new FormatConditions($conditions);
    }

    public function makeFormat(FormatConditions $conditions, array $spots, array $book, int $currentQueue, string $dirNameDate): PublishFormat
    {
        // publishモデルを作成する
        return new PublishFormat($spots, $book, $conditions, $currentQueue, $dirNameDate);
    }

    public function makeList(int $book_id, array $categories, array $cities)
    {

    }
}
