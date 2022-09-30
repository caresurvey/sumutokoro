<?php

namespace Tool\Admin\Domain\Models\Book;

use Illuminate\Support\Collection;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\FormatConditions;
use Tool\Common\Domain\Models\Book\Publish\Format\PublishFormat;

interface BookRepository
{
    public function makeFormat(FormatConditions $conditions, array $spots, array $categories, array $cities): PublishFormat;

    public function makeFormatConditions(array $conditions): FormatConditions;

    public function makeList(int $book_id, array $categories, array $cities);
}
