<?php

namespace Tool\Admin\Application\UseCases\User;

use Tool\Admin\Domain\Models\User\UserRepository;
use Tool\Admin\Infrastructure\Eloquents\EloquentCity;
use Tool\Admin\Infrastructure\Eloquents\EloquentPrefecture;
use Tool\Admin\Infrastructure\Eloquents\EloquentRole;
use Tool\Admin\Infrastructure\Eloquents\EloquentJobType;
use Tool\Admin\Infrastructure\Eloquents\EloquentUserType;

class EditUseCase
{
    private UserRepository $userRepo;
    private EloquentCity $eloquentCity;
    private EloquentPrefecture $eloquentPrefecture;
    private EloquentRole $eloquentRole;
    private EloquentJobType $eloquentJobType;
    private EloquentUserType $eloquentUserType;

    public function __construct(
        UserRepository     $userRepo,
        EloquentCity       $eloquentCity,
        EloquentPrefecture $eloquentPrefecture,
        EloquentRole       $eloquentRole,
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

    public function __invoke(int $id, array $auth): array
    {
        // データを取得する
        $data['user'] = $this->userRepo->edit($id, $auth);
        $data['cities'] = $this->eloquentCity->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['prefectures'] = $this->eloquentPrefecture->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['job_types'] = $this->eloquentJobType->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['user_types'] = $this->eloquentUserType->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['roles'] = $this->eloquentRole->orderBy('reorder', 'asc')->pluck('name', 'id')->toArray();
        $data['isUserEdit'] = true;

        // vueで使う関連付け法人データを作成
        $data['associatedCompanies'] = [];
        if (count($data['user']['companies']) > 0) {
            foreach ($data['user']['companies'] as $company) {
                $data['associatedCompanies'][] = ['id' => $company['id'], 'name' => $company['name']];
            }
        }
        // vueで使う関連付け事業所データを作成
        $data['associatedSpots'] = [];
        if (count($data['user']['spots']) > 0) {
            foreach ($data['user']['spots'] as $spot) {
                $data['associatedSpots'][] = ['id' => $spot['id'], 'name' => $spot['name']];
            }
        }

        // 取得データを返す
        return $data;
    }
}
