<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block;

use Tool\Common\Domain\Models\Book\Publish\Format\Html\Block\Image\ImageBase;

class NameBlock extends ImageBase
{
    /**
     * 事業所名タグを作成
     * @param string $var
     * @return string
     */
    public function makeTag(string $var): string
    {
        // 改行を反映させて返す
        return nl2br(htmlspecialchars($var));
    }
}

