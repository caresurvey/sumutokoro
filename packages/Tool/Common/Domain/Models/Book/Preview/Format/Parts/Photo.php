<?php

namespace Tool\Common\Domain\Models\Book\Preview\Format\Parts;

class Photo
{
    /**
     * タグを作成
     * @param array $icons
     * @return string
     */
    public function makeTag(array $var): string
    {
        // 写真がある場合、写真を指定したタグを生成して返す
        if ($var['spot_main_image']['name'] !== '') {
            return '<img src="%%photoPath%%/spots/' . $var['spot_main_image']['name'] . '/' . $var['spot_main_image']['name'] . '_2l.jpg" alt="">';
        }

        // 写真がない場合、NoPhoto用のタグを生成して返す
        return '<img src="%%imgPath%%/format/no_photo.jpg" alt="">';
    }
}

