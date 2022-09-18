<?php

namespace Tool\Admin\Helpers;

use Tool\Admin\Domain\Models\Photo\PhotoList;

class AdminPhoto
{
    /**
     * 表示ボタン
     *
     * @param string $value
     * @return string
     */
    public static function displayLists(PhotoList $photoList)
    {
        // 初期化
        $result = '';

        if ($photoList->isExists()) {
            // 画像がある場合
            foreach ($photoList->data() as $photo) {
                $result .= '<div style="potision: relative; width: 300px; height: 200px; background: #efefef;">';
                //$result .= '<img src="' . app('url')->asset('/') . 'img/' . $photo->name() . '" class="i-photo" id="photoImage"><br>';
                $result .= '<img src="' . app('url')->asset('/') . 'img/base/photo.jpg" style="position: absolute; top: 0; left: 0; z-index: 100; width: 300px;" id="photoImage2"><br>';
                $result .= '<a href="" style="position: absolute; top: 0; right: 0; z-index: 200; width: 20px; background: red; color: blue;">';
                $result .= '<img src="' . app('url')->asset('/') . 'img/base/btn_close.png"></a>';
                $result .= '</div>';
            }
            $result = '<div class="" style="width: 300px;">' . $result . '</div>';
        } else {
            // 画像がない場合
            $result .= '<div class="c-form__imageUploadedArea">';
            $result .= '画像がありません';
            $result .= '</div>';
        }

        return $result;
    }

    public static function displayInput()
    {
        $result = '<div class="c-form__imageInputArea">';
        $result .= '<img class="i-photo" id="photoImage"    ><br>';
        $result .= '<input type="file" class="c-form__file" id="UploadImageBtn">';
        $result .= '<input type="hidden" name="photo[data]" id="photoData" value="">';
        $result .= '</div>';

        return $result;
    }
}
