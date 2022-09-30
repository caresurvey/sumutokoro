<?php

namespace Tool\Admin\Application\UseCases\Book;

use Tool\Admin\Application\Requests\Book\PublishRequest;
use Tool\Admin\Domain\Models\Book\BookRepository;
use Tool\Admin\Domain\Models\Spot\PublishSpotRepository;
use Tool\Admin\Infrastructure\Eloquents\EloquentCategory;
use Tool\Admin\Infrastructure\Eloquents\EloquentCity;

class PublishUseCase
{
    private BookRepository $bookRepo;
    private PublishSpotRepository $publishSpotRepo;
    private EloquentCategory $eloquentCategory;
    private EloquentCity $eloquentCity;
    private PublishRequest $request;

    public function __construct(
        PublishRequest $request,
        BookRepository $bookRepo,
        PublishSpotRepository $publishSpotRepo,
        EloquentCategory $eloquentCategory,
        EloquentCity $eloquentCity,
    )
    {
        $this->request = $request;
        $this->bookRepo = $bookRepo;
        $this->publishSpotRepo = $publishSpotRepo;
        $this->eloquentCategory = $eloquentCategory;
        $this->eloquentCity = $eloquentCity;
    }

    public function __invoke(): bool
    {
        // 印刷の条件モデル作成
        $conditions = $this->bookRepo->makeFormatConditions($this->request->all());

        // 印刷対象spotデータを取得
        $spots = $this->publishSpotRepo->makePublishSpots($conditions);

        // 必要なデータを取得
        $categories = $this->eloquentCategory->pluck('name', 'id')->toArray();
        $cities = $this->eloquentCity->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();

        // Publishモデルを作成
        $publish = $this->bookRepo->makeFormat($conditions, $spots, $categories, $cities);

        // ファイルを出力する
        return $publish->output();
    }
}
