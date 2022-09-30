<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block\Svg;

/**
 * アイコン
 * 
 */
class TypeCross
{
    public function getTag(): string
    {
        return '<img class="svg" src="data:image/svg+xml;utf8,' . $this->getData() . '">';
    }

    public function getData(): string
    {
        return '<?xml version="1.0" encoding="UTF-8"?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37.83 38.05"><defs></defs><path class="cls-1" d="M1.5,38.05c-.38,0-.76-.15-1.06-.44-.59-.58-.59-1.53,0-2.12L35.26,.44c.59-.59,1.53-.59,2.12,0,.59,.58,.59,1.53,0,2.12L2.56,37.6c-.29,.3-.68,.44-1.06,.44Z"/><path class="cls-1" d="M36.33,38.05c-.39,0-.77-.15-1.06-.44L.44,2.56C-.15,1.97-.14,1.02,.44,.44c.59-.58,1.54-.58,2.12,0L37.39,35.49c.58,.59,.58,1.54,0,2.12-.29,.29-.68,.44-1.06,.44Z"/></svg>';
    }
}