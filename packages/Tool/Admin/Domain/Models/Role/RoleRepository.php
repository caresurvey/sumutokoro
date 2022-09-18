<?php

namespace Tool\Admin\Domain\Models\Role;

interface RoleRepository
{
    public function list(): array;
}
