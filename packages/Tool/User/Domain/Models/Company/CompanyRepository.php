<?php

namespace Tool\User\Domain\Models\Company;

use Tool\User\Domain\Models\Common\LogicResponse;

interface CompanyRepository
{
    public function list(array $auth): array;

    public function edit(int $id, array $auth): array;

    public function update(array $request, array $auth): LogicResponse;
}
