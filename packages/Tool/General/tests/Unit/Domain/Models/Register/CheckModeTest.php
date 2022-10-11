<?php

namespace Tool\General\tests\Unit\Domain\Models\Register;

use Tests\TestCase;
use Tool\General\Domain\Models\Register\CheckMode;

class CheckModeTest extends TestCase
{
    /**
     * Test
     *
     * @return void
     */
    public function testNormalMode()
    {
        // テストデータ
        $data['user']['name'] = 'name';

        // テストするクラスを読み込み
        $results = new CheckMode($data);

        // 検証
        $this->assertFalse($results->checkTestMode());
    }

    /**
     * Test
     *
     * @return void
     */
    public function testTestMode()
    {
        // テストデータ
        $data['user']['name'] = 'istestmode';


        // テストするクラスを読み込み
        $results = new CheckMode($data);

        // 検証
        $this->assertTrue($results->checkTestMode());
    }
}
