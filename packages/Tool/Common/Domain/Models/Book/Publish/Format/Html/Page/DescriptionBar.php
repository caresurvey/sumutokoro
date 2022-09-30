<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Page;

use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\ImageBase;

/**
 * ページ横のフォーマット説明パーツ
 */
class DescriptionBar extends ImageBase
{
    public function getTag(bool $isLeftPosition): string
    {
        return '<div class="b-descriptionBar ' . $this->getPositionTag($isLeftPosition) . '">' . $this->descriptionBar->getTag() . '</div>';
    }

    public function getPositionTag(bool $isLeftPosition): string
    {
        // trueなら左タグ
        if ($isLeftPosition === true) return 'b-descriptionBarLeft';

        // それ以外なら右タグ
        return 'b-descriptionBarRight';
    }
}