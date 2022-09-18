<?php

namespace Tool\User\Application\UseCases\Home;

use Tool\User\Infrastructure\Eloquents\EloquentCompanyUser;
use Tool\User\Infrastructure\Eloquents\EloquentSpotUser;

class IndexUseCase
{
    private EloquentCompanyUser $eloquentCompanyUser;
    private EloquentSpotUser $eloquentSpotUser;

    public function __construct(
        EloquentCompanyUser $eloquentCompanyUser,
        EloquentSpotUser $eloquentSpotUser
    )
    {
        $this->eloquentCompanyUser = $eloquentCompanyUser;
        $this->eloquentSpotUser = $eloquentSpotUser;
    }

    public function __invoke(array $auth): array
    {
        $counts['company'] = $this->eloquentCompanyUser->where('user_id', $auth['id'])->count();
        $counts['spot'] = $this->eloquentSpotUser->where('user_id', $auth['id'])->count();

        return $counts;
    }
}
