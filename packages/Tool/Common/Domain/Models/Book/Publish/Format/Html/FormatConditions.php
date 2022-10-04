<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html;

/**
 * フォーマット出力条件モデル
 */
class FormatConditions
{
    private int $area_section_id; // 取得するエリアセクションID（旭川市内・道北エリアなど）
    private int $start; // 取得したデータ切り出しの開始データ数（扉含む）
    private int $end; // 取得したデータ切り出しの終了データ数（扉含む）
    private int $page; // ループ内で現在処理中のデータカウント
    private int $manualPage; // ページ横の説明バー内に記載しているマニュアルページのページ数
    private int $inPageNum; // 1ページ内のフォーマットの数（扉含む）

    public function __construct(array $data)
    {
        // 初期値設定
        $this->area_section_id = 1;
        $this->start= 1;
        $this->end = 1;
        $this->page = 1;
        $this->startPage = 16;
        $this->manualPage = 1;
        $this->inPageNum = 4;


        // データが有ればセット
        if(!empty($data['area_section_id'])) $this->area_section_id = $data['area_section_id'];
        if(!empty($data['start'])) $this->start = $data['start'];
        if(!empty($data['end'])) $this->end = $data['end'];
        if(!empty($data['startPage'])) $this->startPage = $data['startPage'];
        if(!empty($data['manualPage'])) $this->manualPage = $data['manualPage'];
    }



    /**
     * 有効なデータ数
     * @return int
     */
    public function targetPageNum(): int
    {
        // 必要なページ数を割り出す
        $num = ($this->getEnd() - $this->getStart()) + 1;

        // 0以下なら1にする
        if($num <= 0) return 1;

        // それ以外なら結果を返す
        return $num;
    }

    /**
     * 有効なデータ数（扉を含む）
     * @return int
     */
    public function targetDataNum(): int
    {
        // 必要なデータ数を割り出す（扉を含む）
        return $this->targetPageNum() *4;
    }

    /**
     * GETで指定された開始ページを取得
     * @return int
     */
    public function getStart(): int
    {
        return $this->start;
    }

    /**
     * GETで指定された開始ページを取得
     * @return int
     */
    public function getStartPage(): int
    {
        return $this->startPage;
    }

    /**
     * GETで指定された終了ページを取得
     * @return int
     */
    public function getEnd(): int
    {
        return $this->end;
    }

    /**
     * GETで指定されたエリアセクションを取得
     * @return int
     */
    public function getAreaSectionId(): int
    {
        return $this->area_section_id;
    }

    /**
     * GETで指定されたマニュアルのページ数を取得
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
        $this->page += 1;
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

    /**
     * 有効データの最後の数を取得
     * @return int
     */
    public function endSpotNum(): int
    {
        return $this->end * $this->inPageNum;
    }

    /**
     * 出力範囲内かどうか
     * @param int $count
     * @return bool
     */
    public function isInRange(int $count): bool
    {
        // 範囲内ならtrueを返す
        if($this->start <= $count && $count < $this->endSpotNum()) {
            return true;
        }

        // 範囲外ならfalseを返す
        return false;
    }
}