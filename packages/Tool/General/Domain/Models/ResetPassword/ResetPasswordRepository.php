<?php

namespace Tool\General\Domain\Models\ResetPassword;

use Tool\General\Domain\Models\Common\LogicResponse;

interface ResetPasswordRepository
{
    /**
     * @param string $token
     * @return array
     */
    public function getUser(string $token): array;

    /**
     * @param string $email
     * @param string $token
     * @return LogicResponse
     */
    public function store(string $email, string $token): LogicResponse;
}
