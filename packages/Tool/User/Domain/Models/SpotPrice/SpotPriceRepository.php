<?php

namespace Tool\User\Domain\Models\SpotPrice;

interface SpotPriceRepository
{
    public function makeStoreData(): StoreData;
}