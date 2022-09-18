<?php

namespace Tool\Admin\Domain\Models\Company;

interface CompanySearchRepository
{
    public function makeSearch(array $request, string $query): CompanySearch;
}
