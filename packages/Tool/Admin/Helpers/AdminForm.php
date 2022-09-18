<?php

namespace Tool\Admin\Helpers;

use Tool\Admin\Domain\Models\Photo\PhotoList;

class AdminForm
{
    public static function belongsToManyForm(string $model, array $list, array $data): string
    {
        // 初期化
        $result = '';
        
        foreach($list as $value) {

            // IDタグ作成
            $id = $model . $value->id();

            // フォーム名作成
            $name = strtolower($model) . '[]';

            // チェックフラグ設定
            !empty($data[$value->id()]) ? $flg = ' checked' : $flg = '';

            $result .= '<div class="c-form__container">' . "\n";
            $result .= '<input type="checkbox" name="' . $name . '" value="' . $value->id() . '" class="c-form__checkbox" id="' . $id . '"' . $flg . '>' . "\n";
            $result .= '<label for="'.$id.'">' . "\n";
            $result .= $value->name() . "\n";
            $result .= '</label>' . "\n";
            $result .= '</div>' . "\n";
        }

        return $result;
    }
}
