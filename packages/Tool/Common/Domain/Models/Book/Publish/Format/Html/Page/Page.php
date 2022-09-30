<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Page;

use Tool\Common\Domain\Models\Book\Publish\Common\DataInjector;

class Page
{
    public Css $css;
    public DataInjector $dataInjector;
    public DescriptionBar $descriptionBar;
    public AreaLabel $areaLabel;
    public FormatPage $formatPage;

    public function __construct()
    {
        $this->css = new Css();
        $this->dataInjector = new DataInjector();
        $this->descriptionBar = new DescriptionBar();
        $this->areaLabel = new AreaLabel();
        $this->formatPage = new FormatPage();
    }
}