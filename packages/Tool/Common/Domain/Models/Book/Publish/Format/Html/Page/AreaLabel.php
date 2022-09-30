<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Page;

use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\ImageBase;

/**
 * ページ横のエリアラベルパーツ
 */
class AreaLabel extends ImageBase
{
    public function __construct()
    {
        // 親コンストラクタの呼び出し
        parent::__construct();
    }

    public function makeTag(bool $isLeftPosition): string
    {
        // どのエリアを表示するかの判定を入れる

        // タグを作成して返す
        return $this->douoAreaLabels->makeTag($isLeftPosition);
    }
}