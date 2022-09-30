<?php

namespace Tool\Common\Domain\Models\Book\Publish\Common;

use Barryvdh\DomPDF\Facade\Pdf;

/**
 * データの加工を行うモデル
 */
class DataProcessor
{
    /**
     * いらない文字列や改行などを削除して返す
     * @param $var
     * @return string
     */
    public function eliminate($var): string
    {
        // 改行を削除する
        $var = str_replace("\n", "", $var);

        // 空白を削除して返す
        return str_replace('　', '', $var);
    }
}