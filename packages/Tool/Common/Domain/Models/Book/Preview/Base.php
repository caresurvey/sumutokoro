<?php

namespace Tool\Common\Domain\Models\Book\Preview;

use Tool\Common\Domain\Models\Book\Preview\Format\Format;
use Tool\Common\Domain\Models\Book\Preview\Parts\PreviewCssTag;
use Tool\Common\Domain\Models\Book\Preview\Parts\PreviewHtmlTag;

class Base
{
    public Format $format;
    public PreviewCssTag $cssTag;
    public PreviewHtmlTag $htmlTag;

    public function __construct()
    {
        $this->cssTag = new PreviewCssTag();
        $this->format = new Format();
        $this->htmlTag = new PreviewHtmlTag();
    }
}