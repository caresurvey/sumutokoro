<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels;

use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\AreaLabelData;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\AtsubetsuDistrict;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\ChuoDistrict;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\DouoArea;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\HigashiDistrict;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\KitaDistrict;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\KiyotaDistrict;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\MinamiDistrict;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\NishiDistrict;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\ShiroishiDistrict;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\TeineDistrict;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\ToyohiraDistrict;

/**
 * ラベル
 */
class DouoAreaLabels
{
    public ChuoDistrict $chuoDistrict;
    public KitaDistrict $kitaDistrict;
    public HigashiDistrict $higashiDistrict;
    public ShiroishiDistrict $shiroishiDistrict;
    public AtsubetsuDistrict $atsubetsuDistrict;
    public ToyohiraDistrict $toyohiraDistrict;
    public KiyotaDistrict $kiyotaDistrict;
    public MinamiDistrict $minamiDistrict;
    public NishiDistrict $nishiDistrict;
    public TeineDistrict $teineDistrict;
    public DouoArea $douoArea;

    public function __construct()
    {
        $this->chuoDistrict = new ChuoDistrict();
        $this->kitaDistrict = new KitaDistrict();
        $this->higashiDistrict = new HigashiDistrict();
        $this->shiroishiDistrict = new ShiroishiDistrict();
        $this->atsubetsuDistrict = new AtsubetsuDistrict();
        $this->toyohiraDistrict = new ToyohiraDistrict();
        $this->kiyotaDistrict = new KiyotaDistrict();
        $this->minamiDistrict = new MinamiDistrict();
        $this->nishiDistrict = new NishiDistrict();
        $this->teineDistrict = new TeineDistrict();
        $this->douoArea = new DouoArea();
    }

    public function makeTag(bool $isLeftPosition, AreaLabelData $areaLabelData): string
    {
        $result = '<div class="b-areaLabels ' . $this->getPositionTag($isLeftPosition) . '">' . "\n";
        if ($areaLabelData->isExistsLabel(14)) $result .= '<div class="b-areaLabel">' . $this->chuoDistrict->getTag() . '</div>' . "\n";
        if ($areaLabelData->isExistsLabel(15)) $result .= '<div class="b-areaLabel">' . $this->kitaDistrict->getTag() . '</div>' . "\n";
        if ($areaLabelData->isExistsLabel(16)) $result .= '<div class="b-areaLabel">' . $this->higashiDistrict->getTag() . '</div>' . "\n";
        if ($areaLabelData->isExistsLabel(17)) $result .= '<div class="b-areaLabel">' . $this->shiroishiDistrict->getTag() . '</div>' . "\n";
        if ($areaLabelData->isExistsLabel(18)) $result .= '<div class="b-areaLabel">' . $this->atsubetsuDistrict->getTag() . '</div>' . "\n";
        if ($areaLabelData->isExistsLabel(19)) $result .= '<div class="b-areaLabel">' . $this->toyohiraDistrict->getTag() . '</div>' . "\n";
        if ($areaLabelData->isExistsLabel(20)) $result .= '<div class="b-areaLabel">' . $this->kiyotaDistrict->getTag() . '</div>' . "\n";
        if ($areaLabelData->isExistsLabel(21)) $result .= '<div class="b-areaLabel">' . $this->minamiDistrict->getTag() . '</div>' . "\n";
        if ($areaLabelData->isExistsLabel(22)) $result .= '<div class="b-areaLabel">' . $this->nishiDistrict->getTag() . '</div>' . "\n";
        if ($areaLabelData->isExistsLabel(23)) $result .= '<div class="b-areaLabel">' . $this->teineDistrict->getTag() . '</div>' . "\n";
        if ($areaLabelData->isExistsLabel(24)) $result .= '<div class="b-areaLabel">' . $this->douoArea->getTag() . '</div>' . "\n";

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