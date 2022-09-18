<?php

namespace Tool\General\Domain\Models\User;

use Tool\General\Domain\Models\Common\LogicResponse;

interface UserRepository
{
    public function changePassword(array $request): LogicResponse;
}
