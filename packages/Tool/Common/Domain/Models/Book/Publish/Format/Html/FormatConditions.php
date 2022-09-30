<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html;

/**
 * フォーマット出力条件モデル
 */
class FormatConditions
{
    private int $book_id;
    private int $page;
    private int $start;
    private int $end;
    private int $manualPage;

    public function __construct(array $data)
    {
        // 初期値設定
        $this->book_id = 3;
        $this->page = 1;
        $this->start= 1;
        $this->end = 1;
        $this->manualPage = 1;

        // データが有ればセット
        if(!empty($data['book_id'])) $this->book_id = $data['book_id'];
        if(!empty($data['page'])) $this->page = $data['page'];
        if(!empty($data['start'])) $this->start = $data['start'];
        if(!empty($data['end'])) $this->end = $data['end'];
        if(!empty($data['manualPage'])) $this->manualPage = $data['manualPage'];
    }

    /**
     * 開始ページを取得
     * @return int
     */
    public function getStart(): int
    {
        return $this->start;
    }

    /**
     * 終了ページを取得
     * @return int
     */
    public function getEnd(): int
    {
        return $this->end;
    }

    /**
     * ページ数を取得
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * ページ数を取得
     * @return int
     */
    public function getBookId(): int
    {
        return $this->book_id;
    }

    /**
     * ページ数を取得
     * @return int
     */
    public function getManualPage(): int
    {
        return $this->manualPage;
    }

    /**
     * ページ数を1増やす
     * @return void
     */
    public function countUpPage(): void
    {
        $this->page++;
    }

    /**
     * 偶数かどうかをチェックすdる
     * @return bool
     */
    public function isEvenPage(): bool
    {
        // 偶数ならtrue
        if($this->page % 2 === 0) return true;

        // 奇数ならfalse
        return false;
    }
}