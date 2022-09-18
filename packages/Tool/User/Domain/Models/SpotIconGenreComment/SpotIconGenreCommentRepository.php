<?php

namespace Tool\User\Domain\Models\SpotIconGenreComment;

use Tool\User\Domain\Models\SpotIconGenreComment\StoreData;

interface SpotIconGenreCommentRepository
{
    public function makeStoreData(): StoreData;
}
