<?php

namespace Tool\Common\Domain\Models\Book\Preview\Format\Parts;

class MoveinPrice
{
    /**
     * タグを作成
     * @param array $var
     * @return string
     */
    public function makeTag(array $var): string
    {
        // 結果初期化
        $yen = '<span class="bp-moveinYen">円</span>';
        $movein_price_max = '';
        $for_check_movein = '';
        $movein_price_min = '';

        if ($var['movein_price_max'] !== 0) $movein_price_max = number_format($var['movein_price_max']) . $yen;
        if ($var['movein_price_min'] !== 0) $movein_price_min = number_format($var['movein_price_min']) . $yen;
        if ($var['for_check_movein'] !== 0) $for_check_movein = '〜';

        // 文字列を結合して結果を返す
        return $movein_price_min . $for_check_movein . $movein_price_max;
    }
}