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
     * @return string
     */
    public function makeFormatTag(array $spot): string
    {
        // 扉データかどうかをチェック
        if($this->checkType->isCover($spot) === true) {
            // 扉なら扉タグを返す
            return $this->makeCoverTag($spot);
        } else {
            //扉用じゃないなら、フォーマットを返す
            return $this->makeSpotTag($spot);
        }
    }

    public function makeCoverTag($data): string
    {
        // 扉用のデータを作成
        $data = $this->cover->makeCover($data);

        // HTMLのベースとなるコンテナCoverタグを取得
        $html = $this->cover->containerCover->getTag();

        // フォーマットHTMLタグに変数を反映
        return $this->dataInjector->makeTag($html, $data);

    }

    public function makeSpotTag($data): string
    {
        // フォーマット用のデータを作成
        $data = $this->block->makeBlocks($data);

        // HTMLのベースとなるコンテナブロックタグを取得
        $html = $this->block->containerBlock->getTag();

        // フォーマットHTMLタグに変数を反映
        return $this->dataInjector->makeTag($html, $data);

    }

}