<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Publish;

class ElementarySpot
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * spotsデータを取得
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * ページ数を取得
     * @return int
     */
    public function countPage(): int
    {
        return ceil(304 /4);
    }

    /**
     * 扉を含まない純粋なspotのみのデータの数を取得
     * @return int
     */
    public function countSpot(): int
    {
        // 初期化
        $results = 0;

        // データの分だけ処理
        foreach($this->data as $data) {
            // spot分をカウント
            $results += count($data['spots']);
        }

        return $results;
    }

    /**
     * 扉を含んだデータの数を取得
     * @return int
     */
    public function countData(): int
    {
        // 初期化
        $results = 0;

        // データの分だけ処理
        foreach($this->data as $data) {
            // spot分をカウント
            $results += count($data['spots']);
            // 表紙分をカウント
            $results +=1;
        }

        return $results;
    }

}
