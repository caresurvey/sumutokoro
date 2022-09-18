<?php

namespace Tool\User\Domain\Models\SpotIconStatus;

interface SpotIconStatusRepository
{
    public function makeStoreData(): StoreData;

}
