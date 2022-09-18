<?php

namespace Tool\General\Domain\Models\Spot;

interface SpotSearchRepository
{
    public function makeSearch(array $request, string $query): SpotSearch;
}
