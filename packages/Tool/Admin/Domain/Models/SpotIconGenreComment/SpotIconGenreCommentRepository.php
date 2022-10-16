<?php

namespace Tool\Admin\Domain\Models\SpotIconGenreComment;

interface SpotIconGenreCommentRepository
{
    public function makeStoreData(): StoreData;

    public function makeEditData(int $id, array $comments): EditData;
}
