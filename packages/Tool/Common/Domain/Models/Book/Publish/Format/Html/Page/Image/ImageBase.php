<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image;


use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\DohokuAreaLabels;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\DonanAreaLabels;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\DotoAreaLabels;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\DouoAreaLabels;

/**
 * Image基底クラス
 *
 */
class ImageBase
{
    public DescriptionBar $descriptionBar;
    public DohokuAreaLabels $dohokuAreaLabels;
    public DouoAreaLabels $douoAreaLabels;
    public DotoAreaLabels $dotoAreaLabels;
    public DonanAreaLabels $donanAreaLabels;

    public function __construct()
    {
        $this->descriptionBar = new descriptionBar();
        $this->dohokuAreaLabels = new DohokuAreaLabels();
        $this->douoAreaLabels = new DouoAreaLabels();
        $this->dotoAreaLabels = new DotoAreaLabels();
        $this->donanAreaLabels = new DonanAreaLabels();
    }
}