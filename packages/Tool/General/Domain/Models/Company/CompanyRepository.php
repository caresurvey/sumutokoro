<?php

namespace Tool\General\Domain\Models\Company;

use Tool\General\Application\Requests\Company\IndexRequest;
use Tool\General\Application\Requests\Company\StoreRequest;
use Tool\General\Application\Requests\Company\UpdateRequest;

interface CompanyRepository
{
    public function list(IndexRequest $request, array $auth): array;

    //public function store(CompanyStoreRequest $request, array $auth): bool;

    //public function edit(int $id, array $auth, array $prefectures, array $designers, tagList $tags, PhotoForm $photoForm): EditCompany;

    //public function update(CompanyUpdateRequest $request, array $auth): bool;

    //public function display(int $id, int $user_id): bool;

    //public function remove(CompanyDestroyRequest $request): bool;

    //public function duplicate(int $id, int $user_id): bool;

    //public function multiple(array $post, int $user_id): bool;
}
