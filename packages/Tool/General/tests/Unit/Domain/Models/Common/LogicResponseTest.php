<?php

namespace Tool\General\tests\Unit\Domain\Models\Common;

use PHPUnit\Framework\TestCase;
use Tool\General\Domain\Models\Common\LogicResponse;

class LogicResponseTest extends TestCase
{
    /**
     * @test
     */
    public function 正常系()
    {
        // テストするクラスを読み込み
        $result = new LogicResponse(true, 'タイトル', 'メッセージ');

        // 検証
        $this->assertTrue($result->getResponse()['result']);
        $this->assertSame('タイトル', $result->getTitle());
        $this->assertSame('メッセージ', $result->getMessage());
    }

    /**
     * @test
     */
    public function 異常系()
    {
        // テストするクラスを読み込み
        $result = new LogicResponse(false, 'タイトル', 'メッセージ');

        // 検証
        $this->assertFalse($result->getResponse()['result']);
        $this->assertSame('タイトル', $result->getTitle());
        $this->assertSame('メッセージ', $result->getMessage());
    }
}
