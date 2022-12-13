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
        $data['company'] = $this->eloquentCompany->where('display', true)->count();
        $data['news'] = $this->eloquentNews->where('display', true)->count();
        $data['spot'] = $this->eloquentSpot->where('display', true)->count();
        $data['user'] = $this->eloquentUser->where('enabled', true)->count();

        return $data;
    }
}
