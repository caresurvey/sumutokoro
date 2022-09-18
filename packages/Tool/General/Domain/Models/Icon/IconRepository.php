<?php

namespace Tool\General\Domain\Models\Icon;

interface IconRepository
{
    public function makeDetailData(int $spot_id): array;

    public function setComments(array $spot_icon_status, array $comments): string;
}