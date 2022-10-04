<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Cover;

/**
 * フォーマット1つ分のHTMLテンプレート
 * データ置き換え前
 */
class ContainerCover
{
    public function getTag(): string
    {
        return '<div class="b-container">
          <div class="b-coverTitle">%%title%%</div>
          <div class="b-coverNumber">%%number%%</div>
          <div class="b-coverFrame">%%frame%%</div>
        </div>';
    }
}