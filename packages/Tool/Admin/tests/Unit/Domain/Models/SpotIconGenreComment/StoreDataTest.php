<?php

namespace Tool\Admin\tests\Unit\Domain\Models\SpotIconGenreComment;

use PHPUnit\Framework\TestCase;
use Tool\Admin\Domain\Models\SpotIconGenreComment\StoreData;

class StoreDataTest extends TestCase
{
    /**
     * @test
     */
    public function 正常系／spot_idとuser_idが1の場合()
    {
        // テストするクラスを読み込み
        $data = [
            ['spot_icon_item_id' => 2],
            ['spot_icon_item_id' => 3],
            ['spot_icon_item_id' => 4],
            ['spot_icon_item_id' => 5],
            ['spot_icon_item_id' => 6],
            ['spot_icon_item_id' => 7],
        ];

        $model = new StoreData($data);
        $result = $model->getFillData(1, 1);

        // 検証
        $this->assertSame(2, $result[0]['spot_icon_item_id']);
        $this->assertSame(1, $result[0]['display']);
        $this->assertSame(1, $result[0]['spot_id']);
        $this->assertSame(1, $result[0]['user_id']);
        $this->assertSame(3, $result[1]['spot_icon_item_id']);
        $this->assertSame(1, $result[1]['display']);
        $this->assertSame(1, $result[1]['spot_id']);
        $this->assertSame(1, $result[1]['user_id']);
        $this->assertSame(4, $result[2]['spot_icon_item_id']);
        $this->assertSame(1, $result[2]['display']);
        $this->assertSame(1, $result[2]['spot_id']);
        $this->assertSame(1, $result[2]['user_id']);
        $this->assertSame(5, $result[3]['spot_icon_item_id']);
        $this->assertSame(1, $result[3]['display']);
        $this->assertSame(1, $result[3]['spot_id']);
        $this->assertSame(1, $result[3]['user_id']);
        $this->assertSame(6, $result[4]['spot_icon_item_id']);
        $this->assertSame(1, $result[4]['display']);
        $this->assertSame(1, $result[4]['spot_id']);
        $this->assertSame(1, $result[4]['user_id']);
        $this->assertSame(7, $result[5]['spot_icon_item_id']);
        $this->assertSame(1, $result[5]['display']);
        $this->assertSame(1, $result[5]['spot_id']);
        $this->assertSame(1, $result[5]['user_id']);
    }

    /**
     * @test
     */
    public function 正常系／spot_idとuser_idが2の場合()
    {
        // テストするクラスを読み込み
        $data = [
            ['spot_icon_item_id' => 2],
            ['spot_icon_item_id' => 3],
            ['spot_icon_item_id' => 4],
            ['spot_icon_item_id' => 5],
            ['spot_icon_item_id' => 6],
            ['spot_icon_item_id' => 7],
        ];

        $model = new StoreData($data);
        $result = $model->getFillData(2, 2);

        // 検証
        $this->assertSame(2, $result[0]['spot_icon_item_id']);
        $this->assertSame(1, $result[0]['display']);
        $this->assertSame(2, $result[0]['spot_id']);
        $this->assertSame(2, $result[0]['user_id']);
        $this->assertSame(3, $result[1]['spot_icon_item_id']);
        $this->assertSame(1, $result[1]['display']);
        $this->assertSame(2, $result[1]['spot_id']);
        $this->assertSame(2, $result[1]['user_id']);
        $this->assertSame(4, $result[2]['spot_icon_item_id']);
        $this->assertSame(1, $result[2]['display']);
        $this->assertSame(2, $result[2]['spot_id']);
        $this->assertSame(2, $result[2]['user_id']);
        $this->assertSame(5, $result[3]['spot_icon_item_id']);
        $this->assertSame(1, $result[3]['display']);
        $this->assertSame(2, $result[3]['spot_id']);
        $this->assertSame(2, $result[3]['user_id']);
        $this->assertSame(6, $result[4]['spot_icon_item_id']);
        $this->assertSame(1, $result[4]['display']);
        $this->assertSame(2, $result[4]['spot_id']);
        $this->assertSame(2, $result[4]['user_id']);
        $this->assertSame(7, $result[5]['spot_icon_item_id']);
        $this->assertSame(1, $result[5]['display']);
        $this->assertSame(2, $result[5]['spot_id']);
        $this->assertSame(2, $result[5]['user_id']);
    }
}
