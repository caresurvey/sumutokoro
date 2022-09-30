<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block\Svg;

/**
 * アイコン
 * 
 */
class TypeDoubleCircle
{
    public function getTag(): string
    {
        return '<img class="svg" src="data:image/svg+xml;utf8,' . $this->getData() . '">';
    }

    public function getData(): string
    {
        return '<?xml version="1.0" encoding="UTF-8"?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.84 42.84"><defs></defs><path class="cls-1" d="M21.42,42.84C9.61,42.84,0,33.23,0,21.42S9.61,0,21.42,0s21.42,9.61,21.42,21.42-9.61,21.42-21.42,21.42Zm0-39.84C11.26,3,3,11.26,3,21.42s8.26,18.42,18.42,18.42,18.42-8.26,18.42-18.42S31.58,3,21.42,3Z"/><path class="cls-1" d="M21.42,34.3c-7.1,0-12.88-5.78-12.88-12.88s5.78-12.88,12.88-12.88,12.88,5.78,12.88,12.88-5.78,12.88-12.88,12.88Zm0-23.21c-5.7,0-10.33,4.63-10.33,10.33s4.63,10.33,10.33,10.33,10.33-4.63,10.33-10.33-4.63-10.33-10.33-10.33Z"/></svg>';
    }
}