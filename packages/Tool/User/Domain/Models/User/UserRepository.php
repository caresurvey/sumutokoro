<?php

namespace Tool\User\Domain\Models\User;

use Tool\User\Domain\Models\Common\LogicResponse;

interface UserRepository
{
    public function edit(array $auth): array;

    public function update(array $request, array $auth): LogicResponse;
}
