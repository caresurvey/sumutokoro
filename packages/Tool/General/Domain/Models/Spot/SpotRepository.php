<?php

namespace Tool\General\Domain\Models\Spot;

interface SpotRepository
{
    public function list(SpotSearch $search): array;

    public function detail(int $id): array;

    public function count(): int;
}
