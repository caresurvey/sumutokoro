<?php

namespace Tool\User\Domain\Models\Spot;

use Tool\User\Domain\Models\Common\LogicResponse;

interface SpotRepository
{
    public function list(array $auth): array;

    public function edit(int $id, array $auth): array;

    public function update(array $request, array $auth): LogicResponse;

    public function display(int $id, array $auth): LogicResponse;

    public function count(): int;
}
