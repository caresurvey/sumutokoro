<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Cover;

class NumberCover
{
    public function makeTag(int $number): string
    {
        return '掲載件数 <span class="b-coverNumberLarge">' . $number . '</span> 件';
    }
}
