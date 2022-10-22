<?php

namespace Tool\Admin\tests\Feature\Application\ViewComposers;

use Tool\Admin\tests\TestCase;
use Tool\Admin\tests\RefreshDatabaseLite;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\General\Application\ViewComposers\SearchComposer;

class SearchComposerTest extends TestCase
{
    private $searchComposer;
    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->searchComposer = app()->make(SearchComposer::class);
    }

    /**
     * @test
     */
    public function getAreaSapporo()
    {
        // テスト対象メソッドを実行
        $response = $this->searchComposer->getAreaSapporo();

        // チェック
        $this->assertSame('札幌エリア', $response['name']);
        $this->assertSame('area', $response['model']);
        $this->assertSame('areas', $response['models']);
        $this->assertIsInt($response['count']);
    }

    /**
     * @test
     */
    public function getAreaAsahikawa()
    {
        // テスト対象メソッドを実行
        $response = $this->searchComposer->getAreaAsahikawa();

        // チェック
        $this->assertSame('旭川エリア', $response['name']);
        $this->assertSame('area', $response['model']);
        $this->assertSame('areas', $response['models']);
        $this->assertIsInt($response['count']);
    }

    /**
     * @test
     */
    public function getAreaDouo()
    {
        // テスト対象メソッドを実行
        $response = $this->searchComposer->getAreaDouo();

        // チェック
        $this->assertSame('道央エリア', $response['name']);
        $this->assertSame('city', $response['model']);
        $this->assertSame('cities', $response['models']);
        $this->assertIsInt($response['count']);
    }

    /**
     * @test
     */
    public function getAreaDohoku()
    {
        // テスト対象メソッドを実行
        $response = $this->searchComposer->getAreaDohoku();

        // チェック
        $this->assertSame('道北エリア', $response['name']);
        $this->assertSame('city', $response['model']);
        $this->assertSame('cities', $response['models']);
        $this->assertIsInt($response['count']);
    }

    /**
     * @test
     */
    public function getAreaDoto()
    {
        // テスト対象メソッドを実行
        $response = $this->searchComposer->getAreaDoto();

        // チェック
        $this->assertSame('道東エリア', $response['name']);
        $this->assertSame('city', $response['model']);
        $this->assertSame('cities', $response['models']);
        $this->assertIsInt($response['count']);
    }

    /**
     * @test
     */
    public function getAreaDonan()
    {
        // テスト対象メソッドを実行
        $response = $this->searchComposer->getAreaDonan();

        // チェック
        $this->assertSame('道南エリア', $response['name']);
        $this->assertSame('city', $response['model']);
        $this->assertSame('cities', $response['models']);
        $this->assertIsInt($response['count']);
    }

    /**
     * @test
     */
    public function getAreaSectionCityIds()
    {
        // テスト対象メソッドを実行
        $response = $this->searchComposer->getAreaSectionCityIds(2);

        // チェック
        $this->assertIsInt($response[0]);
    }

    /**
     * @test
     */
    public function getCategories()
    {
        // テスト対象メソッドを実行
        $response = $this->searchComposer->getCategories();

        // チェック
        $this->assertSame('特別養護老人ホーム', $response[0]['name']);
        $this->assertSame('特養', $response[0]['book_label']);
        $this->assertSame('介護老人保健施設', $response[1]['name']);
        $this->assertSame('老健', $response[1]['book_label']);
    }


    /**
     * @test
     */
    public function getCities()
    {
        // テスト対象メソッドを実行
        $response = $this->searchComposer->getCities();

        // チェック
        $this->assertSame('稚内市', $response[0]['name']);
        $this->assertSame('札幌市', $response[1]['name']);
        $this->assertSame('函館市', $response[2]['name']);
        $this->assertSame('小樽市', $response[3]['name']);
        $this->assertSame('旭川市', $response[4]['name']);
    }


    /**
     * @test
     */
    public function getPriceRanges()
    {
        // テスト対象メソッドを実行
        $response = $this->searchComposer->getPriceRanges();

        // チェック
        $this->assertSame('指定なし', $response[0]['name']);
        $this->assertSame('〜5万円', $response[1]['name']);
        $this->assertSame('5〜10万円', $response[2]['name']);
        $this->assertSame('10〜15万円', $response[3]['name']);
        $this->assertSame('20万円〜', $response[4]['name']);
    }
}
