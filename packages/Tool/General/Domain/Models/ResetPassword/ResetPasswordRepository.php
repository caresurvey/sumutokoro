<?php

namespace Tool\General\Domain\Models\ResetPassword;

use Tool\General\Domain\Models\Common\LogicResponse;

interface ResetPasswordRepository
{
    public function store(string $email, string $token): LogicResponse;

    public function getUser(string $token): array;
}
