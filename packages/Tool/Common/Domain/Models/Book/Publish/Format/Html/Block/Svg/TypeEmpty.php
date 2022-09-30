<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block\Svg;

/**
 * アイコン
 * 
 */
class TypeEmpty
{
    public function getTag(): string
    {
        return '<img class="svg" src="data:image/svg+xml;utf8,' . $this->getData() . '">';
    }

    public function getData(): string
    {
        return '<?xml version="1.0" encoding="UTF-8"?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33.27 6"><defs></defs><path class="cls-1" d="M30.27,6H3c-1.66,0-3-1.34-3-3S1.34,0,3,0H30.27c1.66,0,3,1.34,3,3s-1.34,3-3,3Z"/></svg>';
    }
}