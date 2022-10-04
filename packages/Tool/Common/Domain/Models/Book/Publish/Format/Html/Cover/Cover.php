<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Cover;

/**
 * 冊子フォーマットの扉パーツを結合したブロック
 */
class Cover extends CoverBase
{
    public function __construct()
    {
        // 親クラスのコンストラクタ呼び出し
        parent::__construct();
    }

    /**
     * 結合Coverを作成
     * @param array $data
     * @return array 配列
     */
    public function makeCover(array $data): array
    {
        return [
            "number" => $this->numberCover->makeTag(count($data['spots'])),
            "title" => $this->titleCover->makeTag($data['area_center']['book_label']),
            "frame" => $this->frameCover->makeTag(),
        ];
    }
}
