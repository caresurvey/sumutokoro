<?php

namespace Tool\General\tests\Unit\Domain\Models\Spot;

use PHPUnit\Framework\TestCase;
use Tool\General\Domain\Models\Spot\SpotSearch;

class SpotSearchTest extends TestCase
{
    /**
     * @test
     */
    public function 正常系_簡易検索()
    {
        // テストデータ
        $data = [
            'category' => 1,
            'city' => 1,
            'keyword' => 'keyword',
            'price_range' => 2,
            'simple' => '1',
        ];
        // テストするクラスを読み込み
        $result = new SpotSearch($data);

        // 検証
        $this->assertFalse($result->isMultiple());
        $this->assertSame(1, $result->getCategory());
        $this->assertSame(1, $result->getCity());
    }

    /**
     * @test
     */
    public function 正常系_複合検索()
    {
        // テストデータ
        $data = [
            'categories' => [1, 2, 3],
            'cities' => [1, 2, 3],
            'multiple' => '1',
        ];
        // テストするクラスを読み込み
        $result = new SpotSearch($data);

        // 検証
        $this->assertTrue($result->isMultiple());
        $this->assertSame(1, $result->getCategories()[0]);
        $this->assertSame(1, $result->getCities()[0]);
    }

    /**
     * @test
     */
    public function 正常系_価格帯データが存在しているかどうか／存在している()
    {
        // テストデータ
        $data = [
            'price_range' => '1',
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data);

        $this->assertTrue($result->isMultiple());
    }

}
