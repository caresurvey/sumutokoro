<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format;

use Tool\Common\Domain\Models\Book\Publish\Common\DataInjector;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\FormatHtml;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\PageHtml;

class PublishFormatBase
{
    public DataInjector $dataInjector;
    public FormatHtml $formatHtml;
    public PageHtml $pageHtml;

    public function __construct()
    {
        // ドメインモデルを生成
        $this->dataInjector = new DataInjector();
        $this->formatHtml = new FormatHtml();
        $this->pageHtml = new PageHtml();
    }
}