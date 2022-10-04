<?php

namespace Tool\Admin\Domain\Models\Book;

use Tool\Common\Domain\Models\Book\Publish\Format\Html\FormatConditions;
use Tool\Common\Domain\Models\Book\Publish\Format\PublishFormat;

interface BookRepository
{
    public function getDataByAreaSection(FormatConditions $conditions): array;

    public function makeFormatConditions(array $conditions): FormatConditions;

    public function makeFormat(FormatConditions $conditions, array $spots, array $book, int $currentQueue, string $dirNameDate): PublishFormat;

    public function makeList(int $book_id, array $categories, array $cities);
}
