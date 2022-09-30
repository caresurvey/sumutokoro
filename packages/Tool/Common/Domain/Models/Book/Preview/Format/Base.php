<?php

namespace Tool\Common\Domain\Models\Book\Preview\Format;

use Tool\Common\Domain\Models\Book\Preview\Format\Parts\CareIcons;
use Tool\Common\Domain\Models\Book\Preview\Format\Parts\FormatHtml;
use Tool\Common\Domain\Models\Book\Preview\Format\Parts\MonthlyPrice;
use Tool\Common\Domain\Models\Book\Preview\Format\Parts\MoveinPrice;
use Tool\Common\Domain\Models\Book\Preview\Format\Parts\Name;
use Tool\Common\Domain\Models\Book\Preview\Format\Parts\NursingIcons;
use Tool\Common\Domain\Models\Book\Preview\Format\Parts\OtherIcons;
use Tool\Common\Domain\Models\Book\Preview\Format\Parts\Photo;
use Tool\Common\Domain\Models\Book\Preview\Format\Parts\Prices;
use Tool\Common\Domain\Models\Book\Preview\Format\Parts\Privatespace;
use Tool\Common\Domain\Models\Book\Preview\Format\Parts\StatusIcons;

class Base
{
    public FormatHtml $formatHtml;
    public CareIcons $careIcons;
    public MonthlyPrice $monthlyPrice;
    public MoveinPrice $moveinPrice;
    public Name $name;
    public NursingIcons $nursingIcons;
    public OtherIcons $otherIcons;
    public Photo $photo;
    public Prices $prices;
    public Privatespace $privatespace;
    public StatusIcons $statusIcons;

    public function __construct()
    {
        $this->formatHtml = new FormatHtml();
        $this->careIcons = new CareIcons();
        $this->monthlyPrice = new MonthlyPrice();
        $this->moveinPrice = new MoveinPrice();
        $this->name = new Name();
        $this->nursingIcons = new NursingIcons();
        $this->otherIcons = new OtherIcons();
        $this->photo = new Photo();
        $this->prices = new Prices();
        $this->privatespace = new Privatespace();
        $this->statusIcons = new StatusIcons();
    }
}