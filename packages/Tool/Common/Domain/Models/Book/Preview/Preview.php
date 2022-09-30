<?php

namespace Tool\Common\Domain\Models\Book\Preview;

class Preview extends Base
{
    private array $data;
    public string $imgPath;
    public string $photoPath;

    public function __construct(string $imgPath, string $photoPath, array $data)
    {
        // 親クラスのコンストラクタ呼び出し
        parent::__construct();

        // 画像パスをセット
        $this->imgPath = $imgPath;

        // 写真パスをセット
        $this->photoPath = $photoPath;

        // データをセット
        $this->data = $data;
    }

    /***
     * 取得したデータをHTMLテンプレートタグに反映して返す
     * @param array $data
     * @return string
     */
    public function makeTag(): string
    {
        // HTMLテンプレートタグ取得
        $result = $this->htmlTag->getTemplate();

        // データ取得
        $data = $this->format->makeData($this->data);

        // プレビュー用の値を追加
        $data['number'] = 51;

        // フォーマットテンプレート内のタグを置き換え
        foreach ($data as $key => $value) {
            $result = str_replace('%%' . $key . '%%', $value, $result);
        }

        // プレビューテンプレート内のタグを置き換え
        foreach ($this->getReplaceData() as $key => $value) {
            $result = str_replace('%%' . $key . '%%', $value, $result);
        }

        return $result;
    }

    /**
     * プレビュー用置き換えの値を用意
     * @return array
     */
    public function getReplaceData(): array
    {
        return [
            'makeDay' => date("y/m/d"),
            'limitDay' => date("Y/m/d"),
            'css' => $this->cssTag->getTemplate(),
            'imgPath' => $this->imgPath,
            'photoPath' => $this->photoPath,
        ];
    }
}