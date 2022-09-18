<?php

namespace Tool\User\Application\UseCases\User;

use Tool\User\Domain\Models\User\UserRepository;
use Tool\User\Infrastructure\Eloquents\EloquentCity;
use Tool\User\Infrastructure\Eloquents\EloquentPrefecture;
use Tool\User\Infrastructure\Eloquents\EloquentRole;
use Tool\User\Infrastructure\Eloquents\EloquentJobType;
use Tool\User\Infrastructure\Eloquents\EloquentUserType;

class EditUseCase
{
    private UserRepository $userRepo;
    private EloquentCity $eloquentCity;
    private EloquentPrefecture $eloquentPrefecture;
    private EloquentRole $eloquentRole;
    private EloquentJobType $eloquentJobType;
    private EloquentUserType $eloquentUserType;

    public function __construct(
        UserRepository  $userRepo,
        EloquentCity       $eloquentCity,
        EloquentPrefecture $eloquentPrefecture,
        EloquentRole $eloquentRole,
        EloquentJobType    $eloquentJobType,
        EloquentUserType   $eloquentUserType
    )
    {
        $this->userRepo = $userRepo;
        $this->eloquentCity = $eloquentCity;
        $this->eloquentPrefecture = $eloquentPrefecture;
        $this->eloquentRole = $eloquentRole;
        $this->eloquentJobType = $eloquentJobType;
        $this->eloquentUserType = $eloquentUserType;
    }

    public function __invoke(array $auth): array
    {
        // データを取得する
        $data['user'] = $this->userRepo->edit($auth);
        $data['cities'] = $this->eloquentCity->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['prefectures'] = $this->eloquentPrefecture->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['job_types'] = $this->eloquentJobType->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['user_types'] = $this->eloquentUserType->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['roles'] = $this->eloquentRole->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['isUserEdit'] = true;

        // 取得データを返す
        return $data;
    }
}
