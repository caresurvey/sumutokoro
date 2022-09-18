<?php

namespace Tool\Admin\Domain\Models\SpotIconStatus;

interface SpotIconStatusRepository
{
    public function makeStoreData(): StoreData;

}
