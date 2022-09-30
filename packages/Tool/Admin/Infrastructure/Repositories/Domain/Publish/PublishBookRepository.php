<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Publish;

use Illuminate\Support\Collection;
use Tool\Admin\Domain\Models\Book\BookRepository;
use Tool\Admin\Infrastructure\Eloquents\EloquentBook;
use Tool\Admin\Exceptions\AdminLogicException;
use Tool\Admin\Infrastructure\Eloquents\EloquentBookSpot;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpot;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\FormatConditions;
use Tool\Common\Domain\Models\Book\Publish\Format\PublishFormat;
use DB;

class PublishBookRepository implements BookRepository
{
    private EloquentBook $eloquentBook;
    private EloquentBookSpot $eloquentBookSpot;
    private EloquentSpot $eloquentSpot;

    public function __construct(
        EloquentBook $eloquentBook,
        EloquentBookSpot $eloquentBookSpot,
        EloquentSpot     $eloquentSpot,
    )
    {
        $this->eloquentBook = $eloquentBook;
        $this->eloquentBookSpot = $eloquentBookSpot;
        $this->eloquentSpot = $eloquentSpot;
    }

    public function makeFormat(FormatConditions $conditions, array $spots, array $categories, array $cities): PublishFormat
    {
        // 冊子データを取得（これをUseCaseに持っていく）
        $book = $this->eloquentBook->where('id', $conditions->getBookId())->first();

        // publishモデルを作成する
        return new PublishFormat($spots, $book->toArray(), $conditions);
    }

    public function makeFormatConditions(array $conditions): FormatConditions
    {
        return new FormatConditions($conditions);
    }

    public function makeList(int $book_id, array $categories, array $cities)
    {

    }
}
