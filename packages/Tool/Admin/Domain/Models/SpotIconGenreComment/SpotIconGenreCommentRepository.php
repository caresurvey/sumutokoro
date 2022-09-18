<?php

namespace Tool\Admin\Domain\Models\SpotIconGenreComment;

use Tool\Admin\Domain\Models\SpotIconGenreComment\StoreData;

interface SpotIconGenreCommentRepository
{
    public function makeStoreData(): StoreData;
}
