<?php

namespace Tool\Common\Domain\Models\Book\Preview\Format\Parts;

class CareIcons
{
    /**
     * ジャンル名
     * @var string
     */
    private string $genre = 'care';

    /**
     * ジャンルID
     * @var int
     */
    private int $genreId = 4;

    /**
     * 想定されるアイコンの数
     * @var int
     */
    private int $count = 10;

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
                $results .= '<img src="%%imgPath%%/format/' . $this->genre . '_' . $i . $this->getType($icon['spot_icon_genre_id']) . '.png" class="bp-' . $this->genre . 'Icon' . $i . '">' . "\n";
                $i++;
            }
        }

        // 作成したタグを返す
        return $results;
    }

    /**
     * 対応か非対応のアイコンを指定
     * @param int $type
     * @return string
     */
    public function getType(int $type): string
    {
        // タイプが3以上なら対応
        if ($type >= 3) return '';

        // それ以外なら非対応
        return '_n';
    }
}

