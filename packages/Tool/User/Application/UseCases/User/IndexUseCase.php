<?php

namespace Tool\User\Application\UseCases\User;

use Tool\User\Domain\Models\User\UserRepository;
use Tool\User\Infrastructure\Eloquents\EloquentCity;
use Tool\User\Infrastructure\Eloquents\EloquentPrefecture;

class IndexUseCase
{
    private EloquentCity $eloquentCity;
    private EloquentPrefecture $eloquentPrefecture;
    private UserRepository $userRepo;

    public function __construct(
        EloquentCity $eloquentCity,
        EloquentPrefecture $eloquentPrefecture,
        UserRepository $userRepo
    )
    {
        $this->eloquentCity = $eloquentCity;
        $this->eloquentPrefecture = $eloquentPrefecture;
        $this->userRepo = $userRepo;
    }

    public function __invoke(array $auth): array
    {
        $data['user'] = $this->userRepo->edit($auth);
        $data['cities'] = $this->eloquentCity->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['prefectures'] = $this->eloquentPrefecture->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();

        return $data;
    }
}
