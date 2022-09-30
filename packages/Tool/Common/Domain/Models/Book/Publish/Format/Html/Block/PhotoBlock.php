<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block;

use Illuminate\Support\Facades\File;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\Block\Image\ImageBase;

class PhotoBlock extends ImageBase
{
    /**
     * 写真タグを作成
     * @param array $var
     * @return string
     */
    public function makeTag(array $var): string
    {
        // 写真がある場合、写真を指定したタグを生成して返す
        if ($var['spot_main_image']['name'] !== '') {
            $file = $this->photoPath . '/spots/' . $var['spot_main_image']['name'] . '/' . $var['spot_main_image']['name'] . '_2l.jpg';
            return '<img src="data:image/png;base64,' . base64_encode(File::get($file)) . '">';
        }

        // 写真がない場合、NoPhoto用のタグを生成して返す
        $file = $this->photoPath . '/no_photo.jpg';
        return '<img src="data:image/png;base64,' . base64_encode(File::get($file)) . '">';
    }
}

