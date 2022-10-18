<?php

namespace Tool\General\Helpers;

class GeneralTextHelper
{
    /**
     * リンク付与
     *
     * @param string $text
     * @return string
     */
    public static function makeLink(string $text): string
    {
        $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
        $replace = '<a href="$1" target="_blank" class="text-accent hover:text-accent_light hover:underline">$1</a>';
        $text = preg_replace($pattern, $replace, htmlspecialchars($text));

        return $text;
    }
}
