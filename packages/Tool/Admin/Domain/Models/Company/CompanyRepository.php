<?php

namespace Tool\Admin\Domain\Models\Company;

use Tool\Admin\Application\Requests\Company\IndexRequest;
use Tool\Admin\Application\Requests\Company\RelationalUserRequest;
use Tool\Admin\Application\Requests\Company\StoreRequest;
use Tool\Admin\Application\Requests\Company\UpdateRequest;
use Tool\Admin\Domain\Models\Common\LogicResponse;

interface CompanyRepository
{
    public function list(CompanySearch $search, array $auth): array;

    public function store(array $request, array $auth): LogicResponse;

    public function edit(int $id, array $auth): array;

    public function update(array $request, array $auth): LogicResponse;

    public function display(int $id, array $auth): LogicResponse;

    public function remove(int $id, array $auth): LogicResponse;

    public function count(): int;

    public function keyword(array $request): array;

    public function keyword_selected(array $request): array;
}
