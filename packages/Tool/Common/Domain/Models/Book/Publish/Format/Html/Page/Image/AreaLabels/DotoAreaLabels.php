<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels;

use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\AreaLabelData;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Doto\NemuroKushiroArea;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Doto\OhotsukuArea;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Doto\TokachiHidakaArea;

/**
 * ラベル
 */
class DotoAreaLabels
{
    public NemuroKushiroArea $nemuroKushiro;
    public OhotsukuArea $ohotsukuArea;
    public TokachiHidakaArea $tokachiHidakaArea;

    public function __construct()
    {
        $this->nemuroKushiroArea = new NemuroKushiroArea();
        $this->ohotsukuArea = new OhotsukuArea();
        $this->tokachiHidakaArea = new TokachiHidakaArea();
    }

    public function makeTag(bool $isLeftPosition, AreaLabelData $areaLabelData): string
    {
        $result = '<div class="b-areaLabels ' . $this->getPositionTag($isLeftPosition) . '">' . "\n";
        if($areaLabelData->isExistsLabel(25))$result .= '<div class="b-areaLabel">' . $this->nemuroKushiro->getTag() . '</div>' . "\n";
        if($areaLabelData->isExistsLabel(26))$result .= '<div class="b-areaLabel">' . $this->ohotsukuArea->getTag() . '</div>' . "\n";
        if($areaLabelData->isExistsLabel(27))$result .= '<div class="b-areaLabel">' . $this->tokachiHidakaArea->getTag() . '</div>' . "\n";
        $result .= '</div>' . "\n";

        return $result;
    }

    public function getPositionTag(bool $isLeftPosition): string
    {
        // trueなら左タグ
        if ($isLeftPosition === true) return 'b-areaLabelsLeft';

        // それ以外なら右タグ
        return 'b-areaLabelsRight';
    }
}