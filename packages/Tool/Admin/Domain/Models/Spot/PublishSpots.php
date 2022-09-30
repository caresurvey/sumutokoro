<?php

namespace Tool\Admin\Domain\Models\Spot;


class PublishSpots
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function sort()
    {
        $results = $this->data;
        dd($this->data);
        $results = $this->sortByCity($results);
        $results = $this->sortByAreaCenter($results);
        dd($results);
    }

    /**
     * city別に整列
     * @return void
     */
    public function sortByCity($datas): array
    {
        // 初期化
        $results = [];

        // cityごとに分ける
        foreach($datas['book']['spots'] as $data) {
            $results[$data['city']['book_reorder']][] = $data;
        }

        // ソート
        ksort($results);

        // ソート後の値を戻す
        return $results;
    }

    /**
     * city別に整列
     * @return void
     */
    public function sortByAreaCenter($datas): array
    {
        // 初期化
        $results = [];

        // cityごとに分ける
        foreach($datas as $key => $data) {
            foreach($data as $value) {
                dd($value);
                $results[$key][$value['area_center']['book_reorder']][] = $value;
            }
        }

        dd($results);
        // ソート
        ksort($results);

        dd($results);
        // ソート後の値を戻す
        return $results;
    }
}
