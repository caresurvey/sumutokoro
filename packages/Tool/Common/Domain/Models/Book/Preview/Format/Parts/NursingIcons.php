<?php

namespace Tool\Common\Domain\Models\Book\Preview\Format\Parts;

class NursingIcons
{
    /**
     * ジャンル名
     * @var string
     */
    private string $genre = 'nursing';

    /**
     * ジャンルID
     * @var int
     */
    private int $genreId = 3;

    /**
     * 想定されるアイコンの数
     * @var int
     */
    private int $count = 15;

    /**
     * タグを作成
     * @param array $icons
     * @return string
     */
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
            if ($icon['spot_icon_genre_id'] === $this->genreId && $i <= $this->count) {
                $results .= '<img src="%%imgPath%%/format/type_' . $icon['spot_icon_type']['serial']  . '.png" class="bp-' . $this->genre . 'Icon' . $i . '">' . "\n";
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

