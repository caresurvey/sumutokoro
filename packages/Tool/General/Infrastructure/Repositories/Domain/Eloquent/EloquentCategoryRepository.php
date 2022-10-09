<?php

namespace Tool\General\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Support\Facades\Cache;
use Tool\General\Infrastructure\Eloquents\EloquentCategory;
use Tool\General\Domain\Models\Category\CategoryRepository;

class EloquentCategoryRepository implements CategoryRepository
{
    private EloquentCategory $eloquentCategory;

    public function __construct(EloquentCategory $eloquentCategory)
    {
        // モデル
        $this->eloquentCategory = $eloquentCategory;
    }

    public function list(): array
    {
        //キャッシュからデータを取得（なければキャッシュに保存）
        return Cache::rememberForever("spot_detail_categories", function () {
            // データを取得
            return $this->eloquentCategory
                ->where('display', 1)
                ->orderBy('reorder', 'ASC')
                ->pluck('name', 'id')
                ->toArray();
        });
    }
}
