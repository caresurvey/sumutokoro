<?php

namespace Tool\General\Domain\Models\News;

use Tool\General\Infrastructure\Eloquents\EloquentNews;

interface NewsRepository
{
    public function list(): array;

    public function detail(int $id): EloquentNews;
}
