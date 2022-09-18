<?php

namespace Tool\Admin\tests\Unit\Domain\Models\Common;

use PHPUnit\Framework\TestCase;
use Tool\Admin\Domain\Models\Common\LogicResponse;

class LogicResponseTest extends TestCase
{
    /**
     * @test
     */
    public function 正常系()
    {
        // テストするクラスを読み込み
        $result = new LogicResponse(true, 'タイトル', 'メッセージ', ['id' => 1]);

        // 検証
        $this->assertTrue($result->getResponse()['result']);
        $this->assertSame('タイトル', $result->getResponse()['title']);
        $this->assertSame('メッセージ', $result->getResponse()['message']);
        $this->assertSame(1, $result->getData()['id']);
    }

    /**
     * @test
     */
    public function 異常系()
    {
        // テストするクラスを読み込み
        $result = new LogicResponse(false, 'タイトル', 'メッセージ', ['id' => 1]);

        // 検証
        $this->assertFalse($result->getResponse()['result']);
        $this->assertSame('タイトル', $result->getResponse()['title']);
        $this->assertSame('メッセージ', $result->getResponse()['message']);
        $this->assertSame(1, $result->getData()['id']);
    }
}
