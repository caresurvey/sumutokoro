<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels;

use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\AreaLabelData;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Donan\IburiArea;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Donan\OshimaHiyamaArea;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Donan\ShiribeshiArea;

/**
 * ラベル
 */
class DonanAreaLabels
{
    public IburiArea $iburiArea;
    public OshimaHiyamaArea $oshimaHiyamaArea;
    public ShiribeshiArea $shiribeshiArea;

    public function __construct()
    {
        $this->iburiArea = new IburiArea();
        $this->oshimaHiyamaArea = new OshimaHiyamaArea();
        $this->shiribeshiArea = new ShiribeshiArea();
    }

    public function makeTag(bool $isLeftPosition, AreaLabelData $areaLabelData): string
    {

        $result = '<div class="b-areaLabels ' . $this->getPositionTag($isLeftPosition) . '">' . "\n";
        if($areaLabelData->isExistsLabel(28))$result .= '<div class="b-areaLabel">' . $this->iburiArea->getTag() . '</div>' . "\n";
        if($areaLabelData->isExistsLabel(29))$result .= '<div class="b-areaLabel">' . $this->oshimaHiyamaArea->getTag() . '</div>' . "\n";
        if($areaLabelData->isExistsLabel(30))$result .= '<div class="b-areaLabel">' . $this->shiribeshiArea->getTag() . '</div>' . "\n";
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