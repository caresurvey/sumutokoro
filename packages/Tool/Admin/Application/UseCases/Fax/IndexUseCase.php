<?php

namespace Tool\Admin\Application\UseCases\Fax;

use Tool\Admin\Infrastructure\Eloquents\EloquentCategory;
use Tool\Admin\Infrastructure\Eloquents\EloquentCompany;
use Tool\Admin\Infrastructure\Eloquents\EloquentPrefecture;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpot;
use Tool\Admin\Infrastructure\Eloquents\EloquentUser;

class IndexUseCase
{
    private EloquentCategory $eloquentCategory;
    private EloquentCompany $eloquentCompany;
    private EloquentPrefecture $eloquentPrefecture;
    private EloquentSpot $eloquentSpot;
    private EloquentUser $eloquentUser;

    public function __construct(
        EloquentCategory $eloquentCategory,
        EloquentCompany $eloquentCompany,
        EloquentPrefecture $eloquentPrefecture,
        EloquentSpot $eloquentSpot,
        EloquentUser $eloquentUser
    )
    {
        $this->eloquentCategory = $eloquentCategory;
        $this->eloquentCompany = $eloquentCompany;
        $this->eloquentPrefecture = $eloquentPrefecture;
        $this->eloquentSpot = $eloquentSpot;
        $this->eloquentUser = $eloquentUser;

    }

    public function __invoke(array $auth): array
    {
        $datas['category'] = $this->eloquentCategory->count();
        $datas['company'] = $this->eloquentCompany->count();
        $datas['prefectures'] = $this->eloquentPrefecture->count();
        $datas['spot'] = $this->eloquentSpot->count();
        $datas['user'] = $this->eloquentUser->count();

        return $datas;
    }
}
