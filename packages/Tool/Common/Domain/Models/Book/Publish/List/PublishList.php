<?php

namespace Tool\Common\Domain\Models\Book\Publish;

use Tool\Common\Domain\Models\Book\Layout\Format\Format;

class List extends Base
{
    public Format $format;
    public string $imgPath;

    public function __construct(Format $format, string $imgPath)
    {
        // 親クラスのコンストラクタ呼び出し
        parent::__construct();

        // モデルをセット
        $this->format = $format;

        // 画像パスをセット
        $this->imgPath = $imgPath;
    }

    /***
     * 取得したデータをHTMLテンプレートタグに反映して返す
     * @param array $data
     * @return string
     */
    public function makeTag(): string
    {
        // HTMLテンプレートタグ取得
        $result = $this->getHtmlTag();

        // フォーマットテンプレート内のタグを置き換え
        foreach ($this->format->makeData() as $key => $value) {
            $result = str_replace('%%' . $key . '%%', $value, $result);
        }

        // プレビューテンプレート内のタグを置き換え
        foreach ($this->makeData() as $key => $value) {
            $result = str_replace('%%' . $key . '%%', $value, $result);
        }

        return $result;
    }

    /**
     * 置き換え用の値を用意
     * @return array
     */
    public function makeData(): array
    {
        return [
            'makeDay' => date("y/m/d"),
            'limitDay' => date("Y/m/d"),
            'css' => $this->cssTag->getTemplate(),
            'imgPath' => config('myapp.app_url') . '/img/common/book/preview',
            'photoPath' => config('myapp.app_url') . '/photos',
        ];
    }

    /**
     * HTMLテンプレートタグを取得
     * @return string
     */
    public function getHtmlTag(): string
    {
        return $this->htmlTag->getTemplate();
    }
}