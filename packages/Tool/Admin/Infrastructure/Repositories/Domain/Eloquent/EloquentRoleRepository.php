<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Eloquent;

use Tool\Admin\Infrastructure\Eloquents\EloquentRole;
use Tool\Admin\Domain\Models\Role\RoleRepository;

class EloquentRoleRepository implements RoleRepository
{
    private EloquentRole $eloquentRole;

    public function __construct(
        EloquentRole $eloquentRole
    )
    {
        // モデル
        $this->eloquentRole = $eloquentRole;
    }

    public function list(): array
    {
        // データを取得
        $data = $this->eloquentRole
        ->where('display', 1)
        ->orderBy('reorder', 'ASC')
        ->pluck('name', 'id')
        ->toArray();

        return $data;
    }
}
