<?php

namespace Tool\Common\Domain\Models\Book\Preview\Format\Parts;

class Name
{
    /**
     * タグを作成
     * @param string $imgPath
     * @param array $icons
     * @return string
     */
    public function makeTag(string $var): string
    {
        // 改行を反映させて返す
        return nl2br(htmlspecialchars($var));
    }
}

