<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Page;

/**
 * 1ページ分のフォーマット用HTMLテンプレート
 * データ置き換え前
 */
class FormatPage
{
    public function getTag(): string
    {
      $tag = '<!DOCTYPE html>
        <html lang="ja">
        <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title>出力ページ</title>      
          <style>
            %%css%%
          </style>
        </head>
        
        <body>
          <div class="b-wrapper">
            <div class="b-containers">
              %%format%%
            </div>
            %%descriptionBar%%
            %%areaLabel%%
          </div>
        </body>
      </html>';

      return $tag;
    }
}