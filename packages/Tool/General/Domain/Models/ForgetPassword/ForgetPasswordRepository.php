<?php

namespace Tool\General\Domain\Models\ForgetPassword;

use Tool\General\Domain\Models\Common\LogicResponse;

interface ForgetPasswordRepository
{
    public function store(string $email, string $token): LogicResponse;
}
