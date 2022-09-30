<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels;

use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\Atsubetsu;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\Chuo;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\Douo;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\Higashi;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\Kita;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\Kiyota;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\Minami;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\Nishi;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\Shiroishi;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\Teine;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo\Toyohira;

/**
 * ラベル
 */
class DouoAreaLabels
{
    public Chuo $chuo;
    public Kita $kita;
    public Higashi $higashi;
    public Shiroishi $shiroishi;
    public Atsubetsu $atsubetsu;
    public Toyohira $toyohira;
    public Kiyota $kiyota;
    public Minami $minami;
    public Nishi $nishi;
    public Teine $teine;
    public Douo $douo;

    public function __construct()
    {
        $this->chuo = new Chuo();
        $this->kita = new Kita();
        $this->higashi = new Higashi();
        $this->shiroishi = new Shiroishi();
        $this->atsubetsu = new Atsubetsu();
        $this->toyohira = new Toyohira();
        $this->kiyota = new Kiyota();
        $this->minami = new Minami();
        $this->nishi = new Nishi();
        $this->teine = new Teine();
        $this->douo = new Douo();
    }

    public function makeTag(bool $isLeftPosition): string
    {

        $result = '<div class="b-areaLabels ' . $this->getPositionTag($isLeftPosition) . '">' . "\n";
        $result .= '<div class="b-areaLabel">' . $this->chuo->getTag() . '</div>' . "\n";
        $result .= '<div class="b-areaLabel">' . $this->kita->getTag() . '</div>' . "\n";
        $result .= '<div class="b-areaLabel">' . $this->higashi->getTag() . '</div>' . "\n";
        $result .= '<div class="b-areaLabel">' . $this->shiroishi->getTag() . '</div>' . "\n";
        $result .= '<div class="b-areaLabel">' . $this->atsubetsu->getTag() . '</div>' . "\n";
        $result .= '<div class="b-areaLabel">' . $this->toyohira->getTag() . '</div>' . "\n";
        $result .= '<div class="b-areaLabel">' . $this->kiyota->getTag() . '</div>' . "\n";
        $result .= '<div class="b-areaLabel">' . $this->minami->getTag() . '</div>' . "\n";
        $result .= '<div class="b-areaLabel">' . $this->nishi->getTag() . '</div>' . "\n";
        $result .= '<div class="b-areaLabel">' . $this->teine->getTag() . '</div>' . "\n";
        $result .= '<div class="b-areaLabel">' . $this->douo->getTag() . '</div>' . "\n";

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