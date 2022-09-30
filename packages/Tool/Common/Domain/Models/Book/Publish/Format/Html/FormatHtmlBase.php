<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html;

use Tool\Common\Domain\Models\Book\Publish\Common\DataInjector;
use Tool\Common\Domain\Models\Book\Publish\Common\DataProcessor;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Block\Block;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Cover\Cover;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Page;

class FormatHtmlBase
{
    public Block $block;
    public DataInjector $dataInjector;
    public DataProcessor $dataProcessor;
    public Page $page;

    public function __construct()
    {
        $this->block = new Block();
        $this->cover = new Cover();
        $this->dataInjector = new DataInjector();
        $this->dataProcessor = new DataProcessor();
        $this->page = new Page();
    }
}