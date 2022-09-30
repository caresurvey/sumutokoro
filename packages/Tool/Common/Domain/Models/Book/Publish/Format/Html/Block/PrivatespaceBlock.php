<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block;

use Tool\Common\Domain\Models\Book\Publish\Format\Html\Block\Image\ImageBase;

class PrivatespaceBlock extends ImageBase
{
    /**
     * ジャンルID
     * @var int
     */
    private int $genreId = 5;

    /**
     * 想定される最大項目数
     * @var int
     */
    private int $max = 6;


    // 対象のアイコンだけを抽出してタグ作成
    public function makeTag(array $icons): string
    {
        // データがない場合は空文字を返す
        if (empty($icons[0])) return '';

        // 結果初期化
        $results = '';

        // ループカウント
        $i = 1;

        // 対象のアイコンだけを抽出してタグ作成
        foreach ($icons as $icon) {
            // 対象のジャンルでかつ想定した数内の場合
            if ($icon['spot_icon_genre_id'] === $this->genreId && $i <= $this->max) {
                // 対応可能でかつ表示されている場合
                if ($icon['spot_icon_type_id'] >= 3 && $icon['spot_icon_item']['display'] === 1) {
                    // 区切り用のスラッシュをつける
                    $results .= $icon['spot_icon_item']['name'] . '／';
                }
                $i++;
            }
        }

        // 最後のスラッシュをとってタグを返す
        return $this->removeSlash($results);
    }

    /**
     * 連続で付けた区切りスラッシュの最後だけを削除
     * @param string $results
     * @return string
     */
    function removeSlash(string $results): string
    {
        // 空文字じゃなければ最後のスラッシュを取って返す
        if ($results !== '') return mb_substr($results, 0, -1);

        // 空文字ならそのまま返す
        return $results;
    }
}

