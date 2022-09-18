<?php

namespace Tool\User\Domain\Models\Password;

use Tool\User\Domain\Models\Common\LogicResponse;

interface PasswordRepository
{
    public function update(array $request, array $auth): LogicResponse;

}
