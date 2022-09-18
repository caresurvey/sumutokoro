<?php

namespace Tool\Admin\Domain\Models\Icon;

interface IconRepository
{
    public function makeEditData(int $spot_id, array $comments): array;

    public function setComments(array $spot_icon_status, array $comments): string;

}