<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image;


use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\DouoAreaLabels;

/**
 * Image基底クラス
 *
 */
class ImageBase
{
    public DescriptionBar $descriptionBar;
    public DouoAreaLabels $douoAreaLabels;

    public function __construct()
    {
        $this->descriptionBar = new descriptionBar();
        $this->douoAreaLabels = new DouoAreaLabels();
    }
}