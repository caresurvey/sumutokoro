<?php

namespace Tool\General\Domain\Models\Home;

use Illuminate\Support\Collection;

interface HomeRepository
{
    /**
     * @param int $id
     * @return array
     */
    public function getDatas(): array;
}
