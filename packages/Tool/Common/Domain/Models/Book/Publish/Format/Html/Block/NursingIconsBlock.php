<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block;

use Tool\Common\Domain\Models\Book\Publish\Format\Html\Block\Image\ImageBase;

class NursingIconsBlock extends ImageBase
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
                $results .= '<div class="b-' . $this->genre . 'Icon b-' . $this->genre . 'Icon' . $i . '">' . $this->findTypeImage($icon['spot_icon_type']['serial']) . '</div>' . "\n";
                $i++;
            }
        }

        // タグを返す
        return $results;
    }
}

