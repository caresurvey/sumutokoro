<?php

namespace Tool\Admin\Application\UseCases\Book;

use Tool\Common\Domain\Models\Book\BookRepository;
use Tool\Admin\Infrastructure\Eloquents\EloquentCategory;
use Tool\Admin\Infrastructure\Eloquents\EloquentCity;
use PDF;
class PreviewUseCase
{
    private BookRepository $bookRepo;
    private EloquentCategory $eloquentCategory;
    private EloquentCity $eloquentCity;

    public function __construct(
        BookRepository $bookRepo,
        EloquentCategory $eloquentCategory,
        EloquentCity $eloquentCity,
    )
    {
        $this->bookRepo = $bookRepo;
        $this->eloquentCategory = $eloquentCategory;
        $this->eloquentCity = $eloquentCity;
    }

    public function __invoke(int $id, string $token): string
    {
        // 必要なデータを取得
        $categories = $this->eloquentCategory->pluck('name', 'id')->toArray();
        $cities = $this->eloquentCity->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();

        // プレビュー表示用のHTMLタグを返す
        return $this->bookRepo->makePreview($id, $token, $categories, $cities);
    }
}
