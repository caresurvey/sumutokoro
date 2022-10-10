<?php

namespace Tool\Admin\Domain\Models\User;

use Tool\Admin\Domain\Models\Common\LogicResponse;

interface UserRepository
{
    public function list(): array;

    public function store(array $request, array $auth): LogicResponse;

    public function edit(int $id, array $auth): array;

    public function update(array $request, array $auth): LogicResponse;

    public function enabled(int $id, array $auth): LogicResponse;

    public function remove(int $id, array $auth): LogicResponse;

    public function count(): int;

    public function export(): Export;
}
