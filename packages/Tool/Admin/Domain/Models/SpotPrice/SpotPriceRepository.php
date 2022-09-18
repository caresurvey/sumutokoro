<?php

namespace Tool\Admin\Domain\Models\SpotPrice;

interface SpotPriceRepository
{
    public function makeStoreData(): StoreData;
}