<?php

namespace Tool\Admin\Application\UseCases\Book;

use Tool\Admin\Exceptions\AdminNotFoundException;
use Tool\Admin\Infrastructure\Eloquents\EloquentBook;

class InputUseCase
{
    private EloquentBook $eloquentBook;

    public function __construct(
        EloquentBook $eloquentBook
    )
    {
        $this->eloquentBook = $eloquentBook;
    }

    public function __invoke(): array
    {
        // 必要なデータを取得
        $books = $this->eloquentBook->where('display', 1)->orderBy('reorder', 'asc')->pluck('name', 'id');

        // データが無ければ例外を投げる
        if ($books->count() <= 0) throw new AdminNotFoundException();

        // データを配列にして返す
        return [
            'books' => $books->toArray()
        ];
    }
}
