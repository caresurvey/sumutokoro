<?php

namespace Tool\Admin\Application\UseCases\Home;

use Tool\Admin\Infrastructure\Eloquents\EloquentCompany;
use Tool\Admin\Infrastructure\Eloquents\EloquentNews;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpot;
use Tool\Admin\Infrastructure\Eloquents\EloquentUser;

class IndexUseCase
{
    private EloquentCompany $eloquentCompany;
    private EloquentNews $eloquentNews;
    private EloquentSpot $eloquentSpot;
    private EloquentUser $eloquentUser;

    public function __construct(
        EloquentCompany $eloquentCompany,
        EloquentNews $eloquentNews,
        EloquentSpot $eloquentSpot,
        EloquentUser $eloquentUser
    )
    {
        $this->eloquentCompany = $eloquentCompany;
        $this->eloquentNews = $eloquentNews;
        $this->eloquentSpot = $eloquentSpot;
        $this->eloquentUser = $eloquentUser;
    }

    public function __invoke(array $auth): array
    {
        $data['company'] = $this->eloquentCompany->count();
        $data['news'] = $this->eloquentNews->count();
        $data['spot'] = $this->eloquentSpot->count();
        $data['user'] = $this->eloquentUser->count();

        return $data;
    }
}
