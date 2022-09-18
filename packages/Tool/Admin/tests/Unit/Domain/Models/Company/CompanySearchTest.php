<?php

namespace Tool\Admin\tests\Unit\Domain\Models\Company;

use PHPUnit\Framework\TestCase;
use Tool\Admin\Domain\Models\Company\CompanySearch;

class CompanySearchTest extends TestCase
{
    /**
     * @test
     */
    public function 正常系_検索パラメーターが全部あるパターン()
    {
        // テストするクラスを読み込み
        $result = new CompanySearch(
            [
                'category' => '2',
                'city' => '3',
                'keyword' => '法人',
                'simple' => '1',
            ]
        );

        // 検証
        $this->assertTrue($result->isSimple());
        $this->assertTrue($result->existsCategory());
        $this->assertTrue($result->existsCity());
        $this->assertTrue($result->existsKeyword());
        $this->assertSame(2, $result->getCategory());
        $this->assertSame(3, $result->getCity());
        $this->assertSame('法人', $result->getKeyword());
    }

    /**
     * @test
     */
    public function 正常系_検索パラメーターが一部あるパターン()
    {
        // テストするクラスを読み込み
        $result = new CompanySearch(
            [
                'category' => '2',
                'keyword' => '法人',
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
        $this->assertSame('法人', $result->getKeyword());
    }

    /**
     * @test
     */
    public function 正常系_検索パラメーターがないパターン()
    {
        // テストするクラスを読み込み
        $result = new CompanySearch(
            [
                'category' => '2',
                'keyword' => '法人',
            ]
        );

        // 検証
        $this->assertFalse($result->isSimple());
    }
}
