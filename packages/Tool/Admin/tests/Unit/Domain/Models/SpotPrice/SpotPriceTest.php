<?php

namespace Tool\Admin\tests\Unit\Domain\Models\SpotPrice;

use PHPUnit\Framework\TestCase;
use Tool\Admin\Domain\Models\SpotPrice\StoreData;

class SpotPriceTest extends TestCase
{
    /**
     * @test
     */
    public function 正常系／spot_idとuser_idが1の場合()
    {
        // テストするクラスを読み込み
        $data = [
            ['name' => '', 'description' => '', 'ps' => '', 'reorder' => 1, 'price_genre_id' => 2],
            ['name' => '', 'description' => '', 'ps' => '', 'reorder' => 1, 'price_genre_id' => 3],
            ['name' => '', 'description' => '', 'ps' => '', 'reorder' => 1, 'price_genre_id' => 4],
            ['name' => '', 'description' => '', 'ps' => '', 'reorder' => 1, 'price_genre_id' => 5],
            ['name' => '', 'description' => '', 'ps' => '', 'reorder' => 1, 'price_genre_id' => 6],
            ['name' => '', 'description' => '', 'ps' => '', 'reorder' => 1, 'price_genre_id' => 7],
        ];

        $model = new StoreData($data);
        $result = $model->getFillData(1, 1);

        // 検証
        $this->assertSame('', $result[0]['name']);
        $this->assertSame('', $result[0]['description']);
        $this->assertSame('', $result[0]['ps']);
        $this->assertSame(1, $result[0]['reorder']);
        $this->assertSame(2, $result[0]['price_genre_id']);
        $this->assertSame(1, $result[0]['spot_id']);
        $this->assertSame(1, $result[0]['user_id']);
        $this->assertSame('', $result[5]['name']);
        $this->assertSame('', $result[5]['description']);
        $this->assertSame('', $result[5]['ps']);
        $this->assertSame(1, $result[5]['reorder']);
        $this->assertSame(7, $result[5]['price_genre_id']);
        $this->assertSame(1, $result[5]['spot_id']);
        $this->assertSame(1, $result[5]['user_id']);
    }
}
