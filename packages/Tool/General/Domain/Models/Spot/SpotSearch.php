<?php

namespace Tool\General\Domain\Models\Spot;

class SpotSearch
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * 受け取った値をすべて返す
     * @return array
     */
    public function getData(): array
    {
        // 値を返す
        return $this->data;
    }

    /**
     * 受け取った市町村パラメーターを返す
     * @return string
     */
    public function getCategory(): int
    {
        // 何もなければ1を返す
        if(empty($this->data['category'])) return 1;

        // 数字以外なら1を返す
        if (!preg_match('/^[0-9]+$/', $this->data['category'])) return 1;

        // 値があればそれを返す
        return (int)$this->data['category'];
    }

    /**
     * 受け取った市町村パラメーターを返す
     * @return string
     */
    public function getCity(): int
    {
        // 何もなければ1を返す
        if(empty($this->data['city'])) return 1;

        // 数字以外なら1を返す
        if (!preg_match('/^[0-9]+$/', $this->data['city'])) return 1;

        // 値があればそれを返す
        return (int)$this->data['city'];
    }

    /**
     * 受け取ったキーワードパラメーターを返す
     * @return string
     */
    public function getKeyword(): string
    {
        // 何もなければ空文字を返す
        if(empty($this->data['keyword'])) return '';

        // 値があればそれを返す
        return $this->data['keyword'];
    }

    /**
     * 受け取った価格帯パラメーターを返す
     * @return string
     */
    public function getPriceRange(): int
    {
        // 何もなければ1を返す
        if(empty($this->data['price_range'])) return 1;

        // 数字以外なら1を返す
        if (!preg_match('/^[0-9]+$/', $this->data['price_range'])) return 1;

        // 値があればそれを返す
        return (int)$this->data['price_range'];
    }

    /**
     * クエリストリングを返す
     * @return string
     */
    public function getQuery(): string
    {
        // 何もなければ空文字を返す
        if(empty($this->data['query'])) return '';

        // 値があればそれを返す
        return $this->data['query'];
    }

    /**
     * 複合検索かどうか
     * @return string
     */
    public function isMultiple(): bool
    {
        // 存在してなければfalse
        if(empty($this->data['multiple'])) return false;

        // 存在してて、1ならtrue
        if($this->data['multiple'] === '1') return true;

        // それ以外なら無しとみなしてfalseを返す
        return false;
    }

    /**
     * 簡易検索かどうか
     * @return string
     */
    public function isSimple(): bool
    {
        // 存在してなければfalse
        if(empty($this->data['simple'])) return false;

        // 存在してて、1ならtrue
        if($this->data['simple'] === '1') return true;

        // それ以外なら無しとみなしてfalseを返す
        return false;
    }

    /**
     * カテゴリデータが存在しているかどうか
     * @return bool
     */
    public function existsCategory(): bool
    {
        return ($this->getCategory() !== 1);
    }

    /**
     * 市町村データが存在しているかどうか
     * @return bool
     */
    public function existsCity(): bool
    {
        return ($this->getCity() !== 1);
    }

    /**
     * キーワードが存在しているかどうか
     * @return bool
     */
    public function existsKeyword(): bool
    {
        return ($this->getCity() !== '');
    }

    /**
     * 価格帯データが存在しているかどうか
     * @return bool
     */
    public function existsPriceRange(): bool
    {
        return ($this->getPriceRange() !== 1);
    }

}
