<?php

namespace Tool\Common\Domain\Models\Book\Preview\Format\Parts;

class MonthlyPrice
{
    /**
     * タグを作成
     * @param array $var
     * @return string
     */
    public function makeTag(array $var): string
    {
        // 結果初期化
        $yen = '<span class="bp-monthlyYen">円</span>';
        $monthly_price_max = '';
        $for_check_monthly = '';
        $monthly_price_min = '';

        if ($var['monthly_price_max'] !== 0) $monthly_price_max = number_format($var['monthly_price_max']) . $yen;
        if ($var['monthly_price_min'] !== 0) $monthly_price_min = number_format($var['monthly_price_min']) . $yen;
        if ($var['for_check_monthly'] !== 0) $for_check_monthly = '〜';

        // 文字列を結合して結果を返す
        return $monthly_price_min . $for_check_monthly . $monthly_price_max;
    }
}
