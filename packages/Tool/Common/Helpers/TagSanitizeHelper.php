<?php

namespace Tool\Common\Helpers;

//use App;
//use Config;
//use Log;

class TagSanitizeHelper
{
    /**
     * サニタイズを行う。
     * @param string $content サニタイズを行う文字列
     * @param array $apply_tags サニタイズを行わない(タグ使用を許可する)タグ名一覧
     * @return string サニタイズ後の文字列
     */
    public static function sanitize($content, $apply_tags)
    {
        //var_dump($content); exit;
        $content = htmlspecialchars($content);

        if (!is_array($apply_tags) || count($apply_tags) == 0 ) return $content;

        foreach($apply_tags as $tag) {
            if (strpos($tag, '/') === false) {
                $content = preg_replace_callback("/&lt;\/?". $tag . "( .*?&gt;|\/?&gt;)/i", function ($matches) {
                    $target_str = $matches[0];
                    $target_str = str_replace('&lt;', '<', $target_str);
                    $target_str = str_replace('&gt;', '>', $target_str);
                    $target_str = str_replace('&quot;', '"', $target_str);
                    $target_str = str_replace('&amp;', '&', $target_str);
                    $target_str = str_replace('&nbsp;', '　', $target_str);
                    $target_str = str_replace('&quot;&gt;', '">', $target_str);
                    $target_str = str_replace('&amp;nbsp;', '　', $target_str);

                    return $target_str;
                },
                $content);

            }
        }

        return str_replace('&amp;nbsp;', '　', $content);
    }

    /**
     * ページの本文で使用できるタグの一覧を取得する
     * @return array サニタイズしないタグ一覧
     */
    public static function getContentApplyTagList() {
        return Config::get('myapp.apply_tags');
    }
}
