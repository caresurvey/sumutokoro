<?php

namespace Tool\Common\Domain\Models\Book\Publish\Common;

/**
 * テンプレート内の変数タグに実データを注入するモデル
 */
class DataInjector
{
    /**
     * @param string $html htmlのテンプレート
     * @param array $data 反映するデータ配列
     * @return string
     */
    public function makeTag(string $html, array $data): string
    {
        // データの分だけテンプレートに反映する
        foreach ($data as $key => $value) {
            $html = str_replace('%%' . $key . '%%', $value, $html);
        }

        // データを反映したテンプレートテキストを返す
        return $html;
    }
}