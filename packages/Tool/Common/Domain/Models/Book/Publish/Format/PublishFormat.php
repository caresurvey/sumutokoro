<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format;

use PDF;
use Barryvdh\Snappy\PdfWrapper;
use Illuminate\Support\Facades\File;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\FormatConditions;
use Tool\Common\Exceptions\CommonLogicException;

/**
 * PDFを出力するモデル
 */
class PublishFormat extends PublishFormatBase
{
    // 1ページ内4件にするためのページ内のフォーマットカウント数初期化
    private int $formatCount = 1;
    // 1ページに出力するHTMLタグ
    private string $formatHtmlTag;
    // 出力パス
    private string $outputPath;
    // 処理したデータ数初期化
    private int $processedCount = 1;
    // 処理する事業所データ数をセット
    private int $spotCount = 1;
    // ページ出力条件モデル
    private FormatConditions $conditions;
    // 事業所のデータ
    private array $spots;
    // 冊子データ
    private array $book;
    // 出力Dir名の日付
    private string $dirNameDate;
    // キューの区切り数
    private int $queuesSeparateNum = 20;
    // 現在のキュー位置
    public int $currentQueue;
    // ページ内に配置するフォーマットの数
    private int $inPageNum = 4;

    // ページごとのパーツの左右の位置が左かどうか
    private bool $isLeftPosition = true;

    /**
     * @param array $spots 事業所情報
     * @param array $book 冊子情報
     * @param FormatConditions $conditions 出力条件モデル
     */
    public function __construct(array $spots, array $book, FormatConditions $conditions, int $currentQueue, string $dirNameDate)
    {
        // 親コンストラクタ呼び出し
        parent::__construct();

        // 事業所データをセット
        $this->spots = $spots;

        // 冊子データをセット
        $this->book = $book;

        // ページの数字をセット
        $this->conditions = $conditions;

        // 現在のキュー位置
        $this->currentQueue = $currentQueue;

        // 出力Dirの名前用日付
        $this->dirNameDate = $dirNameDate;

        // ページ内のフォーマットHTML初期化
        $this->formatHtmlTag = '';

        // 出力先のディレクトリパスを指定
        $this->outputPath = storage_path('output');

        // データ数をセット
        $this->spotCount = count($this->spots);
    }

    /**
     * ループ処理の前の事前処理
     * @return bool
     */
    public function loopInitialize(): bool
    {
        // データがなければ何もしない
        if (count($this->spots) <= 0) return false;

        // 保存先にディレクトリがなければ作成
        if (!file_exists($this->outputFileDir())) {
            // 保存ディレクトリを作成
            mkdir($this->outputFileDir());
        }

        return true;
    }

    /**
     * PDFを出力する
     * @param string $html 出力するPDFの中に入れるHTMLタグ
     * @param string $outputPath PDF出力先のパス
     * @return bool
     */
    public function output(): bool
    {
        // ループ処理の前の事前処理
        if(!$this->loopInitialize()) return false;

        // 実行条件が揃ったらデータの数だけ処理
        try {
            // データの分だけ処理する
            foreach ($this->spots as $spot) {

                // データが配列じゃなかったら、配列にする
                if(!is_array($spot)) $spot = $spot->toArray();

                // エリアラベルデータセット
                $this->areaLabelData->setData($spot);

                // フォーマットHTMLタグを作成
                $formatHtmlTag = $this->formatHtml->makeFormatTag($spot);

                // ページHTMLにフォーマットHTMLを追加
                $this->addThisPage($formatHtmlTag);

                // 改ページをするかどうか
                if ($this->isClosePage()) {
                    // 改ページ条件になったら現在のデータを改ページ処理する
                    if(!$this->closeThisPage()) throw new CommonLogicException();
                }

                // フォーマットのカウントをプラス
                $this->formatCount++;

                // 処理したデータ数をプラス
                $this->processedCount++;
            }

            return true;

        } catch (CommonLogicException $e) {
            Logger($e->getMessage());
            return false;
        }
    }

    /**
     * 改ページをする必要があるかどうか
     * @return bool
     */
    public function isClosePage(): bool
    {
        // フォーマットが1ページを作成する数(4つ)そろったから改ページ
        if ($this->isCreatePageRequirement()) return true;

        // データの残りがなくなった場合、改ページ
        if ($this->isUseUp()) return true;

        // 達していなければfalseを返す
        return false;
    }

    /**
     * フォーマットが1ページを作成する数(4つ)そろったかどうか
     * @return bool
     */
    public function isCreatePageRequirement(): bool
    {
        // フォーマットの数がMAXに達していなければfalseを返す
        if ($this->formatCount <= $this->getInPageNum()) return false;

        // 達していればtrueを返す
        return true;
    }

    /**
     * 用意されたデータを使い切ったかどうか
     * @return bool
     */
    public function isUseUp(): bool
    {
        // 処理したデータ数と処理するべきspotカウント数を比較して、同じなら使い切っていたとしてtrueを返す
        if ($this->processedCount === $this->spotCount) return true;

        // 使い切っていなければfalseを返す
        return false;
    }

    /**
     * このページの処理を終了して改ページ処理をする
     * @return bool
     */
    public function closeThisPage(): bool
    {
        try {
            // ページのHTMLタグをフォーマットのHTMLタグと結合する
            $formatPageTag = $this->pageHtml->makeTag($this->formatHtmlTag, $this->isLeftPosition, $this->areaLabelData);

            // PDFファイルを出力、エラーが出れば例外を投げる
            if (!$this->outputFile($formatPageTag)) throw new CommonLogicException();

            // カウント初期化
            $this->formatCount = 1;

            // HTMLタグ初期化
            $this->formatHtmlTag = '';

            // ページ数をアップ
            $this->conditions->countUpPage();

            // ページごとのパーツの左右の位置を書き換える
            $this->changeLeftPosition();

            // エリアラベルをリセットする
            $this->areaLabelData->reset();

            // trueを返す
            return true;

        } catch (CommonLogicException $e) {
            // エラーを書き込み
            Logger($e->getMessage());
            // falseを返す
            return false;
        }
    }

    /**
     * このページにフォーマットデータを追加する
     * @return bool
     */
    public function addThisPage(string $formatHtmlTag): bool
    {
        // 追加
        $this->formatHtmlTag .= $formatHtmlTag;

        // falseを返す
        return true;
    }

    /**
     * PDFを出力する
     * @param string $html 出力するPDFの中に入れるHTMLタグ
     * @return bool 成功or失敗
     */
    public function outputFile(string $html): bool
    {
        try {
            // PDFファイルのデータを作成
            $pdf = $this->makePdf($html);
            // PDFデータをファイルに出力
            File::put($this->makeFilePath(), $pdf->output());
            // trueを返す
            return true;

        } catch (CommonLogicException $e) {
            // エラーログ書き込み
            Logger($e->getMessage());
            // falseを返す
            return false;
        }
    }

    public function makeHtml(): string
    {
        return '';
    }

    /**
     * PDFファイルのデータを作成
     * @param string $html 出力する1ページ分のHtmlタグデータ
     * @return PDF
     */
    public function makePdf(string $html): PdfWrapper
    {
        // PDFを作成
        return PDF::loadHTML($html)
            ->setOption('encoding', 'utf-8')
            ->setPaper('A4')
            ->setOption('margin-top', 0)
            ->setOption('margin-bottom', 0)
            ->setOption('margin-left', 0)
            ->setOption('margin-right', 0)
            ->setOption('dpi', 350);
    }

    /**
     * 出力ファイル名を作成
     * @return string
     */
    public function makeFileName(): string
    {
        return $this->getOutputPage() . '.pdf';
    }

    /**
     * 出力先ディレクトリ名
     * @return string
     */
    public function outputFileDir(): string
    {
        return $this->outputPath . '/' . $this->book['serial'] . '_' . $this->dirNameDate;
    }

    /**
     * 出力先ファイルパスを作成
     * @return string
     */
    public function makeFilePath(): string
    {
        return $this->outputFileDir() . '/' . $this->makeFileName();
    }

    /**
     * 現在のキューを取得
     * @return int
     */
    public function getCurrentQueue(): int
    {
        return $this->currentQueue;
    }

    /**
     * 左右ポジションの切り替え
     * @return bool
     */
    public function changeLeftPosition(): bool
    {
        // 偶数ページの場合
        if($this->conditions->isEvenPage()) {
            // 左側にセット
            $this->isLeftPosition = true;
        } else {
            // それ以外は奇数として右側にセット
            $this->isLeftPosition = false;
        }

        // 結果を返す
        return $this->isLeftPosition;
    }

    /**
     * 開始スポット数
     * ページに1ページのフォーマット数4を掛ける
     * @return int
     */
    public function getFromSpotNumber(): int
    {
        return ($this->conditions->getStart() * $this->getInPageNum()) + $this->getAppendQueueCount();
    }

    /**
     * 終了スポット数
     * ページに1ページのフォーマット数4を掛ける
     * @return int
     */
    public function getToSpotNumber(): int
    {
        return ($this->conditions->getEnd() * $this->getInPageNum()) + $this->getAppendQueueCount();
    }

    /**
     * キューの分だけ追加する数（キューが２つ以降ある場合に影響）
     * @return int
     */
    public function getAppendQueueCount(): int
    {
        return $this->currentQueue * $this->queuesSeparateNum;
    }

    /**
     * キューの区切り数を取得
     * @return int
     */
    public function getQueuesSeparateNum(): int
    {
        return $this->queuesSeparateNum;
    }

    /**
     * 出力範囲内かどうか
     * @param int $count
     * @return bool
     */
    public function isInRange(int $count): bool
    {
        // 範囲内ならtrueを返す
        if($this->getFromSpotNumber() <= $count && $count < $this->getToSpotNumber()) {
            return true;
        }

        // 範囲外ならfalseを返す
        return false;
    }

    /**
     * 実際に出力を開始するページ数を取得
     * 開始指定ページ数やデータ開始位置などを加味する
     * @return int
     */
    public function getStartPageNum(): int
    {
        return $this->conditions->getStartPage() + $this->getComputedPageNum();
    }

    /**
     * 計算追加用のページ数を取得
     * @return int
     */
    public function getComputedPageNum(): int
    {
        return $this->conditions->getPage() - 1;
    }

    /**
     * ページ内に配置するフォーマットの数を取得
     * @return int
     */
    public function getInPageNum(): int
    {
        return $this->inPageNum;
    }

    /**
     * 出力するファイル名を取得
     * @return int
     */
    public function getOutputPage(): int
    {
        return $this->getStartPageNum() + $this->getAppendQueueCount();
    }
}