<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block;

use Tool\Common\Domain\Models\Book\Publish\Format\Html\Block\Image\ImageBase;

class FrameBlock extends ImageBase
{
    /**
     * タグを作成
     * @return string
     */
    public function makeTag(): string
    {
        // 作成したタグを返す
        return $this->frame->getTag();
    }
}

