<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html;

/**
 * フォーマット1件分のHtmlタグ
 */
class FormatHtml extends FormatHtmlBase
{
    public function __construct()
    {
        // 親クラスのコンストラクタの呼び出し
        parent::__construct();
    }

    /**
     * フォーマット1件分のHtmlタグを作成
     * @param array spots フォーマット用に加工されたspotデータ1件分
     * @param string fontPath フォントttfファイルがおいてある場所
     * @return string
     */
    public function makeFormatTag(array $spot): string
    {
        $isCover = false;

        // 扉データかどうかをチェック
        if($isCover === true) {
            // 扉用なら、扉用のデータを作成
            $data = $this->block->makeCover($spot);
        } else {
            // 扉用じゃないなら、フォーマット用のデータを作成
            $data = $this->block->makeBlocks($spot);
        }

        // HTMLのベースとなるコンテナブロックタグを取得
        $html = $this->block->containerBlock->getTag();

        // フォーマットHTMLタグに変数を反映
        return $this->dataInjector->makeTag($html, $data);
    }
}