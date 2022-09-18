<?php

namespace Tool\General\Application\UseCases\Home;

use Tool\General\Infrastructure\Eloquents\EloquentNews;

class IndexUseCase
{
    private EloquentNews $eloquentNews;

    public function __construct(
        EloquentNews $eloquentNews,
    )
    {
        $this->eloquentNews = $eloquentNews;
    }

    public function __invoke(): array
    {
        $data['news'] = $this->eloquentNews->where('display', true)->limit(3)->get();

        return $data;
    }
}
