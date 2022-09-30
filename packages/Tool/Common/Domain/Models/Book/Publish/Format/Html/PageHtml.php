<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html;

use Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Page;

/**
 * 冊子フォーマットの各ブロックを結合したブロック
 */
class PageHtml extends Page
{
    public function __construct()
    {
        // 親クラスのコンストラクタ呼び出し
        parent::__construct();
    }

    /**
     * 個別のフォーマットタグをページ用に結合
     * @param string $formatTag
     * @return string
     */
    public function makeTag(string $formatTag, bool $isLeftPosition): string
    {
        // 反映するHTMLを作成
        $formatPageTag = $this->formatPage->getTag();

        // フォーマットHTMLタグに変数を反映
        return $this->dataInjector->makeTag($formatPageTag, $this->makeData($formatTag,$isLeftPosition));
    }

    /**
     * 置き換え用データを作成
     * @param string $formatTag 事業所データ1件分
     * @return array 配列
     */
    public function makeData(string $formatTag, bool $isLeftPosition): array
    {
        return [
            "css" => $this->css->getTag(),
            "descriptionBar" => $this->descriptionBar->getTag($isLeftPosition),
            "areaLabel" => $this->areaLabel->makeTag($isLeftPosition),
            "format" => $formatTag,
        ];
    }

}
