<?php

namespace Tool\Admin\Domain\Models\ResetPassword;

interface ResetPasswordRepository
{
    public function save(string $email, string $token): bool;

    public function getUser(string $token): array;
}
