<?php

namespace Tool\Admin\Domain\Models\News;

use Tool\Admin\Domain\Models\Common\LogicResponse;

interface NewsRepository
{
    public function list(): array;

    public function store(array $request, array $auth): LogicResponse;

    public function edit(int $id, array $auth): array;

    public function display(int $id, array $auth): LogicResponse;

    public function remove(int $id, $auth): LogicResponse;

    public function count(): int;
}
