<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block;

use Tool\Common\Domain\Models\Book\Publish\Format\Html\Block\Image\ImageBase;

class CareIconsBlock extends ImageBase
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
                if ($icon['spot_icon_type_id'] >= 3 && $icon['spot_icon_item']['display'] === 1) {
                    $results .= '<div class="b-' . $this->genre . 'Icon b-' . $this->genre . 'Icon' . $i . '">' . $this->findCareIconImage($icon['spot_icon_item']['serial']) . '</div>' . "\n";
                    $i++;
                }
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

