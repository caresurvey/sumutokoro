<?php

namespace Tool\Common\Domain\Models\Book\Preview\Format\Parts;

class Prices
{
    /**
     * タグを作成
     * @param array $var
     * @return string
     */
    public function makeTag(array $prices): string
    {
        // 結果初期化
        $results = '';

        // データがない場合は空文字を返す
        if (empty($prices[0])) return '';

        foreach ($prices as $price) {
            $results .= $price['price_genre']['name'] . "／" . $price['name'] . "<br>"."\n";
        }

        // 結果を返す
        return $results;
    }
}

