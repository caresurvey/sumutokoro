<?php

namespace Tool\General\Domain\Models\ForgetPassword;

use Tool\General\Domain\Models\Common\LogicResponse;

interface ForgetPasswordRepository
{
    public function makeToken(string $email): string;

    public function store(string $email, string $token): LogicResponse;
}
