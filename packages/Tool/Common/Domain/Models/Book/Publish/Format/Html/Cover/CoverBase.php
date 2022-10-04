<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Cover;

class CoverBase
{
    public ContainerCover $containerCover;
    public FrameCover $frameCover;
    public NumberCover $numberCover;
    public TitleCover $titleCover;

    public function __construct()
    {
        $this->containerCover = new ContainerCover();
        $this->frameCover = new FrameCover();
        $this->numberCover = new NumberCover();
        $this->titleCover = new TitleCover();
    }
}