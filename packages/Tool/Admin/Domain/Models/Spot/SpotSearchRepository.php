<?php

namespace Tool\Admin\Domain\Models\Spot;

interface SpotSearchRepository
{
    public function makeSearch(array $request, string $query): SpotSearch;
}
