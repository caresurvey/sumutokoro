<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block\Svg;

/**
 * アイコン
 * 
 */
class TypeTriangle
{
    public function getTag(): string
    {
        return '<img class="svg" src="data:image/svg+xml;utf8,' . $this->getData() . '">';
    }

    public function getData(): string
    {
        return '<?xml version="1.0" encoding="UTF-8"?><svg id="_レイヤー_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48.95 34.93"><defs></defs><path class="cls-1" d="M47.45,34.93H1.5c-.57,0-1.08-.32-1.34-.82s-.2-1.11,.13-1.57L23.88,.61c.29-.39,.7-.6,1.23-.61,.48,0,.93,.24,1.21,.64l22.37,31.93c.32,.46,.36,1.06,.1,1.55-.26,.5-.77,.81-1.33,.81ZM4.47,31.93H44.57L25.05,4.07,4.47,31.93Z"/></svg>';
    }
}