<?php

namespace Tool\Admin\tests\Unit\Domain\Models\Spot;

use PHPUnit\Framework\TestCase;
use Tool\Admin\Domain\Models\Spot\SpotSearch;

class SpotSearchTest extends TestCase
{
    /**
     * @test
     */
    public function 正常系_検索パラメーターが全部あるパターン()
    {
        // テストするクラスを読み込み
        $result = new SpotSearch(
            [
                'category' => '2',
                'city' => '3',
                'keyword' => '事業所',
                'price_range' => '4',
                'simple' => '1',
            ]
        );

        // 検証
        $this->assertTrue($result->isSimple());
        $this->assertTrue($result->existsCategory());
        $this->assertTrue($result->existsCity());
        $this->assertTrue($result->existsKeyword());
        $this->assertTrue($result->existsPriceRange());
        $this->assertSame(2, $result->getCategory());
        $this->assertSame(3, $result->getCity());
        $this->assertSame('事業所', $result->getKeyword());
        $this->assertSame(4, $result->getPriceRange());
    }

    /**
     * @test
     */
    public function 正常系_検索パラメーターが一部あるパターン()
    {
        // テストするクラスを読み込み
        $result = new SpotSearch(
            [
                'category' => '2',
                'keyword' => '事業所',
                'simple' => '1',
            ]
        );

        // 検証
        $this->assertTrue($result->isSimple());
        $this->assertTrue($result->existsCategory());
        $this->assertFalse($result->existsCity());
        $this->assertTrue($result->existsKeyword());
        $this->assertSame(2, $result->getCategory());
        $this->assertSame(1, $result->getCity());
        $this->assertSame('事業所', $result->getKeyword());
    }

    /**
     * @test
     */
    public function 正常系_検索パラメーターがないパターン()
    {
        // テストするクラスを読み込み
        $result = new SpotSearch(
            [
                'category' => '2',
                'keyword' => '事業所',
            ]
        );

        // 検証
        $this->assertFalse($result->isSimple());
    }
}
