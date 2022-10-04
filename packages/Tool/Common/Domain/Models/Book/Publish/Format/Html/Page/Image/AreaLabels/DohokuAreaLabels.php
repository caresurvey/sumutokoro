<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels;

use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\AreaLabelData;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Dohoku\Chuo;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Dohoku\KaguraNishikagura;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Dohoku\Toyooka;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Dohoku\HigashiasahikawaChiyoda;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Dohoku\Toko;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Dohoku\ShinasahikawaNagayamaminami;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Dohoku\Nagayama;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Dohoku\SuehiroHigashitakasu;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Dohoku\ShunkoShunkodai;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Dohoku\HokuseiKyokusei;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Dohoku\KamuiEtanbetsu;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Dohoku\DohokuArea;

/**
 * ラベル
 */
class DohokuAreaLabels
{
    public Chuo $chuo;
    public Toyooka $toyooka;
    public HigashiasahikawaChiyoda $higashiasahikawaChiyoda;
    public Toko $toko;
    public ShinasahikawaNagayamaminami $shinasahikawaNagayamaminami;
    public Nagayama $nagayama;
    public SuehiroHigashitakasu $suehiroHigashitakasu;
    public ShunkoShunkodai $shunkoShunkodai;
    public HokuseiKyokusei $hokuseiKyokusei;
    public KamuiEtanbetsu $kamuiEtanbetsu;
    public KaguraNishikagura $kaguraNishikagura;
    public DohokuArea $dohokuArea;

    public function __construct()
    {
        $this->chuo = new Chuo();
        $this->toyooka = new Toyooka();
        $this->higashiasahikawaChiyoda = new HigashiasahikawaChiyoda();
        $this->toko = new Toko();
        $this->shinasahikawaNagayamaminami = new ShinasahikawaNagayamaminami();
        $this->nagayama = new Nagayama();
        $this->suehiroHigashitakasu = new SuehiroHigashitakasu();
        $this->shunkoShunkodai = new ShunkoShunkodai();
        $this->hokuseiKyokusei = new HokuseiKyokusei();
        $this->kamuiEtanbetsu = new KamuiEtanbetsu();
        $this->kaguraNishikagura = new KaguraNishikagura();
        $this->dohokuArea = new DohokuArea();

    }

    public function makeTag(bool $isLeftPosition, AreaLabelData $areaLabelData): string
    {
        $result = '<div class="b-areaLabels ' . $this->getPositionTag($isLeftPosition) . '">' . "\n";
        if($areaLabelData->isExistsLabel(2)) $result .= '<div class="b-areaLabel">' . $this->chuo->getTag() . '</div>' . "\n";
        if($areaLabelData->isExistsLabel(3)) $result .= '<div class="b-areaLabel">' . $this->toyooka->getTag() . '</div>' . "\n";
        if($areaLabelData->isExistsLabel(4)) $result .= '<div class="b-areaLabel">' . $this->higashiasahikawaChiyoda->getTag() . '</div>' . "\n";
        if($areaLabelData->isExistsLabel(5)) $result .= '<div class="b-areaLabel">' . $this->toko->getTag() . '</div>' . "\n";
        if($areaLabelData->isExistsLabel(6)) $result .= '<div class="b-areaLabel">' . $this->shinasahikawaNagayamaminami->getTag() . '</div>' . "\n";
        if($areaLabelData->isExistsLabel(7)) $result .= '<div class="b-areaLabel">' . $this->nagayama->getTag() . '</div>' . "\n";
        if($areaLabelData->isExistsLabel(8)) $result .= '<div class="b-areaLabel">' . $this->suehiroHigashitakasu->getTag() . '</div>' . "\n";
        if($areaLabelData->isExistsLabel(9)) $result .= '<div class="b-areaLabel">' . $this->shunkoShunkodai->getTag() . '</div>' . "\n";
        if($areaLabelData->isExistsLabel(10)) $result .= '<div class="b-areaLabel">' . $this->hokuseiKyokusei->getTag() . '</div>' . "\n";
        if($areaLabelData->isExistsLabel(11)) $result .= '<div class="b-areaLabel">' . $this->kamuiEtanbetsu->getTag() . '</div>' . "\n";
        if($areaLabelData->isExistsLabel(12)) $result .= '<div class="b-areaLabel">' . $this->kaguraNishikagura->getTag() . '</div>' . "\n";
        if($areaLabelData->isExistsLabel(13)) $result .= '<div class="b-areaLabel">' . $this->dohokuArea->getTag() . '</div>' . "\n";
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