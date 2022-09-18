<?php

namespace Tool\General\tests\Unit\Domain\Models\Contact;

use Tests\TestCase;
use Tool\General\Domain\Models\Contact\CheckMode;

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
        $data['contact']['name'] = 'name';


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
        $data['contact']['name'] = 'istestmode';


        // テストするクラスを読み込み
        $results = new CheckMode($data);

        // 検証
        $this->assertTrue($results->checkTestMode());
    }
}
