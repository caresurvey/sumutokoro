<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Page;

/**
 * エリアラベルデータ
 */
class AreaLabelData
{
    private array $labels;
    private string $book;

    /**
     * データをリセットする
     * @return void
     */
    public function reset()
    {
        // 初期化
        $this->labels = [];
        $this->book = '';
    }

    /**
     * データをセットする
     * @return void
     */
    public function setData(array $data)
    {
        if(empty($data['book_spot'][0])) dd($data);
        $this->labels[] = $data['area_center']['area']['area_label']['id'];
        $this->book = $data['book_spot'][0]['serial'];
    }

    /**
     * ラベルデータを取得する
     * @return array
     */
    public function getLabels(): array
    {
        return array_unique($this->labels);
    }

    /**
     * 冊子データを取得する
     * @return string
     */
    public function getBook(): string
    {
        return $this->book;
    }

    /**
     * 指定するIDがデータの中に含まれているか
     * @param int $id
     * @return bool
     */
    public function isExistsLabel(int $id): bool
    {
        return in_array($id, $this->getLabels(), true);
    }

}