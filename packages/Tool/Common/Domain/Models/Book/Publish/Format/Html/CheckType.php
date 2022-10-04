<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html;

/**
 * BlockかCoverかのタイプを判定する
 */
class CheckType
{
    public function isCover(array $data): bool
    {
        if(!empty($data['area_center']['is_cover'])) return true;

        return false;
    }
}
