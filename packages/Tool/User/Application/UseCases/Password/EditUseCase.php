<?php

namespace Tool\User\Application\UseCases\Password;

use Tool\User\Domain\Models\User\UserRepository;
use Tool\User\Infrastructure\Eloquents\EloquentCity;
use Tool\User\Infrastructure\Eloquents\EloquentPrefecture;
use Tool\User\Infrastructure\Eloquents\EloquentRole;

class EditUseCase
{
    private UserRepository $userRepo;
    private EloquentCity $eloquentCity;
    private EloquentPrefecture $eloquentPrefecture;
    private EloquentRole $eloquentRole;

    public function __construct(
        UserRepository  $userRepo,
        EloquentCity       $eloquentCity,
        EloquentPrefecture $eloquentPrefecture,
        EloquentRole $eloquentRole
    )
    {
        $this->userRepo = $userRepo;
        $this->eloquentCity = $eloquentCity;
        $this->eloquentPrefecture = $eloquentPrefecture;
        $this->eloquentRole = $eloquentRole;
    }

    public function __invoke(array $auth): array
    {
        // データを取得する
        $data['user'] = $this->userRepo->edit($auth);
        $data['cities'] = $this->eloquentCity->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['prefectures'] = $this->eloquentPrefecture->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['roles'] = $this->eloquentRole->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['isUserEdit'] = true;

        // 取得データを返す
        return $data;
    }
}
