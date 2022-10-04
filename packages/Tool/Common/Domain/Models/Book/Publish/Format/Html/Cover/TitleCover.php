<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Cover;

class TitleCover
{
    public function makeTag(string $title): string
    {
        return $title;
        //return '<div class="b-coverTitleCity">旭川市</div><br><div class="b-coverTitleArea">神居・江丹別</div>';
    }
}