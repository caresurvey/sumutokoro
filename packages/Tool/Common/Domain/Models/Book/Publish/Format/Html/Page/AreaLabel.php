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

    /**
     * データをセットする
     * @return void
     */
    public function setData()
    {

    }

    /**
     * エリアセクションを判定する
     * @return void
     */
    public function chooseSection()
    {

    }

    /**
     * タグの作成
     * @param bool $isLeftPosition
     * @return string
     */
    public function makeTag(bool $isLeftPosition, AreaLabelData $areaLabelData): string
    {
        // どのエリアを表示するかの判定をしてタグを作成し、返す
        if($areaLabelData->getBook() === 'dohoku') return $this->dohokuAreaLabels->makeTag($isLeftPosition, $areaLabelData);
        if($areaLabelData->getBook() === 'douo') return $this->douoAreaLabels->makeTag($isLeftPosition, $areaLabelData);
        if($areaLabelData->getBook() === 'doto') return $this->dotoAreaLabels->makeTag($isLeftPosition, $areaLabelData);
        if($areaLabelData->getBook() === 'donan') return $this->donanAreaLabels->makeTag($isLeftPosition, $areaLabelData);

        // どれにも当てはまらなければ空文字を返す
        return '';
    }
}