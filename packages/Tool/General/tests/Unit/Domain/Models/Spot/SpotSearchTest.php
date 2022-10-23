<?php

namespace Tool\General\tests\Unit\Domain\Models\Spot;

use PHPUnit\Framework\TestCase;
use Tool\General\Domain\Models\Spot\SpotSearch;

class SpotSearchTest extends TestCase
{
    /**
     * @test
     */
    public function 正常系_受け取った値をすべて返す()
    {
        // テストデータ
        $data = [
            'query' => 'test',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        // 評価
        $this->assertSame('test', $result->getData()['query']);
    }

    /**
     * @test
     */
    public function 正常系_受け取ったカテゴリパラメーターを返す()
    {
        // テストデータ
        $data = [
            'category' => '2',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        // 評価
        $this->assertSame(2, $result->getCategory());
    }

    /**
     * @test
     */
    public function 正常系_受け取ったカテゴリパラメーターを返す（値が数字以外）()
    {
        // テストデータ
        $data = [
            'category' => 'a',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame(1, $result->getCategory());
    }

    /**
     * @test
     */
    public function 正常系_受け取ったカテゴリパラメーターを返す（値が空）()
    {
        // テストデータ
        $data = [
            'category' => '',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame(1, $result->getCategory());
    }

    /**
     * @test
     */
    public function 正常系_受け取ったカテゴリパラメーターを返す（値なし）()
    {
        // テストデータ
        $data = [
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame(1, $result->getCategory());
    }

    /**
     * @test
     */
    public function 正常系_受け取った複数カテゴリパラメーターを返す()
    {
        // テストデータ
        $data = [
            'categories' => [2,3],
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        // 評価
        $this->assertSame(2, $result->getCategories()[0]);
        $this->assertSame(3, $result->getCategories()[1]);
    }

    /**
     * @test
     */
    public function 正常系_受け取った複数カテゴリパラメーターを返す（値が空）()
    {
        // テストデータ
        $data = [
            'categories' => [],
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame([], $result->getCategories());
    }

    /**
     * @test
     */
    public function 正常系_受け取った複数カテゴリパラメーターを返す（値なし）()
    {
        // テストデータ
        $data = [
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame([], $result->getCategories());
    }

    /**
     * @test
     */
    public function 正常系_受け取ったエリアパラメーターを返す()
    {
        // テストデータ
        $data = [
            'area' => '2',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        // 評価
        $this->assertSame(2, $result->getArea());
    }

    /**
     * @test
     */
    public function 正常系_受け取ったエリアパラメーターを返す（値が数字以外）()
    {
        // テストデータ
        $data = [
            'area' => 'a',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame(1, $result->getArea());
    }

    /**
     * @test
     */
    public function 正常系_受け取ったエリアパラメーターを返す（値が空）()
    {
        // テストデータ
        $data = [
            'area' => '',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame(1, $result->getArea());
    }

    /**
     * @test
     */
    public function 正常系_受け取ったエリアパラメーターを返す（値なし）()
    {
        // テストデータ
        $data = [
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame(1, $result->getArea());
    }

    /**
     * @test
     */
    public function 正常系_受け取った複数エリアパラメーターを返す()
    {
        // テストデータ
        $data = [
            'areas' => [2,3],
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        // 評価
        $this->assertSame(2, $result->getAreas()[0]);
        $this->assertSame(3, $result->getAreas()[1]);
    }

    /**
     * @test
     */
    public function 正常系_受け取った複数エリアパラメーターを返す（値が空）()
    {
        // テストデータ
        $data = [
            'areas' => [],
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame([], $result->getAreas());
    }

    /**
     * @test
     */
    public function 正常系_受け取った複数エリアパラメーターを返す（値なし）()
    {
        // テストデータ
        $data = [
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame([], $result->getAreas());
    }

    /**
     * @test
     */
    public function 正常系_受け取った市町村パラメーターを返す()
    {
        // テストデータ
        $data = [
            'city' => '2',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        // 評価
        $this->assertSame(2, $result->getCity());
    }

    /**
     * @test
     */
    public function 正常系_受け取った市町村パラメーターを返す（値が数字以外）()
    {
        // テストデータ
        $data = [
            'city' => 'a',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame(1, $result->getCity());
    }

    /**
     * @test
     */
    public function 正常系_受け取った市町村パラメーターを返す（値が空）()
    {
        // テストデータ
        $data = [
            'city' => '',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame(1, $result->getCity());
    }

    /**
     * @test
     */
    public function 正常系_受け取った市町村パラメーターを返す（値なし）()
    {
        // テストデータ
        $data = [
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame(1, $result->getCity());
    }

    /**
     * @test
     */
    public function 正常系_受け取った複数市町村パラメーターを返す()
    {
        // テストデータ
        $data = [
            'cities' => [2,3],
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        // 評価
        $this->assertSame(2, $result->getCities()[0]);
        $this->assertSame(3, $result->getCities()[1]);
    }

    /**
     * @test
     */
    public function 正常系_受け取った複数市町村パラメーターを返す（値が空）()
    {
        // テストデータ
        $data = [
            'cities' => [],
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame([], $result->getCities());
    }

    /**
     * @test
     */
    public function 正常系_受け取った複数市町村パラメーターを返す（値なし）()
    {
        // テストデータ
        $data = [
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame([], $result->getCities());
    }

    /**
     * @test
     */
    public function 正常系_受け取ったキーワードパラメーターを返す()
    {
        // テストデータ
        $data = [
            'keyword' => '事業所',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame('事業所', $result->getKeyword());
    }

    /**
     * @test
     */
    public function 正常系_受け取ったキーワードパラメーターを返す（値が空）()
    {
        // テストデータ
        $data = [
            'keyword' => '',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame('', $result->getKeyword());
    }

    /**
     * @test
     */
    public function 正常系_受け取ったキーワードパラメーターを返す（値なし）()
    {
        // テストデータ
        $data = [
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame('', $result->getKeyword());
    }

    /**
     * @test
     */
    public function 正常系_受け取った価格帯パラメーターを返す()
    {
        // テストデータ
        $data = [
            'price_range' => '3',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame(3, $result->getPriceRange());
    }

    /**
     * @test
     */
    public function 正常系_受け取った価格帯パラメーターを返す（値が空）()
    {
        // テストデータ
        $data = [
            'price_range' => '',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame(1, $result->getPriceRange());
    }

    /**
     * @test
     */
    public function 正常系_受け取った価格帯パラメーターを返す（値がない）()
    {
        // テストデータ
        $data = [
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame(1, $result->getPriceRange());
    }

    /**
     * @test
     */
    public function 正常系_受け取った価格帯パラメーターを返す（値が数字以外）()
    {
        // テストデータ
        $data = [
            'price_range' => 'a',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame(1, $result->getPriceRange());
    }

    /**
     * @test
     */
    public function 正常系_クエリストリングを返す()
    {
        // テストデータ
        $data = [
            'query' => 'test',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame('test', $result->getQuery());
    }

    /**
     * @test
     */
    public function 正常系_クエリストリングを返す（値が空）()
    {
        // テストデータ
        $data = [
            'query' => '',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame('', $result->getQuery());
    }

    /**
     * @test
     */
    public function 正常系_クエリストリングを返す（値がない）()
    {
        // テストデータ
        $data = [
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertSame('', $result->getQuery());
    }

    /**
     * @test
     */
    public function 正常系_複合検索()
    {
        // テストデータ
        $data = [
            'multiple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertTrue($result->isMultiple());
    }

    /**
     * @test
     */
    public function 正常系_複合検索じゃない（値が空）()
    {
        // テストデータ
        $data = [
            'multiple' => '',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertFalse($result->isMultiple());
    }

    /**
     * @test
     */
    public function 正常系_複合検索じゃない（値がない）()
    {
        // テストデータ
        $data = [
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertFalse($result->isMultiple());
    }

    /**
     * @test
     */
    public function 正常系_簡易検索()
    {
        // テストデータ
        $data = [
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertTrue($result->isSimple());
    }

    /**
     * @test
     */
    public function 正常系_簡易検索じゃない（値が空）()
    {
        // テストデータ
        $data = [
            'simple' => '',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertFalse($result->isSimple());
    }

    /**
     * @test
     */
    public function 正常系_簡易検索じゃない（値がない）()
    {
        // テストデータ
        $data = [
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertFalse($result->isSimple());
    }

    /**
     * @test
     */
    public function 正常系_カテゴリデータが存在しているかどうか／存在している()
    {
        // テストデータ
        $data = [
            'category' => '2',
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertTrue($result->existsCategory());
    }

    /**
     * @test
     */
    public function 正常系_カテゴリデータが存在しているかどうか／存在していない（値が1）()
    {
        // テストデータ
        $data = [
            'category' => '1',
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertFalse($result->existsCategory());
    }

    /**
     * @test
     */
    public function 正常系_カテゴリデータが存在しているかどうか／存在していない（値がない）()
    {
        // テストデータ
        $data = [
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertFalse($result->existsCategory());
    }

    /**
     * @test
     */
    public function 正常系_複数カテゴリデータが存在しているかどうか／存在している()
    {
        // テストデータ
        $data = [
            'categories' => [2],
            'multiple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertTrue($result->existsCategories());
    }

    /**
     * @test
     */
    public function 正常系_複数カテゴリデータが存在しているかどうか／存在していない（値がない）()
    {
        // テストデータ
        $data = [
            'categories' => [],
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertFalse($result->existsCategories());
    }

    /**
     * @test
     */
    public function 正常系_複数カテゴリデータが存在しているかどうか／存在していない（項目がない）()
    {
        // テストデータ
        $data = [
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertFalse($result->existsCategories());
    }

    /**
     * @test
     */
    public function 正常系_エリアデータが存在しているかどうか／存在している()
    {
        // テストデータ
        $data = [
            'area' => '2',
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertTrue($result->existsArea());
    }

    /**
     * @test
     */
    public function 正常系_エリアデータが存在しているかどうか／存在していない（値が1）()
    {
        // テストデータ
        $data = [
            'area' => '1',
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertFalse($result->existsArea());
    }

    /**
     * @test
     */
    public function 正常系_エリアデータが存在しているかどうか／存在していない（値がない）()
    {
        // テストデータ
        $data = [
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertFalse($result->existsArea());
    }

    /**
     * @test
     */
    public function 正常系_複数エリアデータが存在しているかどうか／存在している()
    {
        // テストデータ
        $data = [
            'areas' => [2],
            'multiple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertTrue($result->existsAreas());
    }

    /**
     * @test
     */
    public function 正常系_複数エリアデータが存在しているかどうか／存在していない（値がない）()
    {
        // テストデータ
        $data = [
            'areas' => [],
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertFalse($result->existsAreas());
    }

    /**
     * @test
     */
    public function 正常系_複数エリアデータが存在しているかどうか／存在していない（項目がない）()
    {
        // テストデータ
        $data = [
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertFalse($result->existsAreas());
    }

    /**
     * @test
     */
    public function 正常系_市町村データが存在しているかどうか／存在している()
    {
        // テストデータ
        $data = [
            'city' => '2',
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertTrue($result->existsCity());
    }

    /**
     * @test
     */
    public function 正常系_市町村データが存在しているかどうか／存在していない（値が1）()
    {
        // テストデータ
        $data = [
            'city' => '1',
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertFalse($result->existsCity());
    }

    /**
     * @test
     */
    public function 正常系_市町村データが存在しているかどうか／存在していない（値がない）()
    {
        // テストデータ
        $data = [
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertFalse($result->existsCity());
    }

    /**
     * @test
     */
    public function 正常系_複数市町村データが存在しているかどうか／存在している()
    {
        // テストデータ
        $data = [
            'cities' => [2],
            'multiple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertTrue($result->existsCities());
    }

    /**
     * @test
     */
    public function 正常系_複数市町村データが存在しているかどうか／存在していない（値がない）()
    {
        // テストデータ
        $data = [
            'cities' => [],
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertFalse($result->existsCities());
    }

    /**
     * @test
     */
    public function 正常系_複数市町村データが存在しているかどうか／存在していない（項目がない）()
    {
        // テストデータ
        $data = [
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertFalse($result->existsCities());
    }

    /**
     * @test
     */
    public function 正常系_キーワードが存在しているかどうか／存在している()
    {
        // テストデータ
        $data = [
            'keyword' => '事業所',
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertTrue($result->existsKeyword());
    }

    /**
     * @test
     */
    public function 正常系_キーワードが存在しているかどうか／存在していない()
    {
        // テストデータ
        $data = [
            'keyword' => '',
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertFalse($result->existsKeyword());
    }

    /**
     * @test
     */
    public function 正常系_価格帯データが存在しているかどうか／存在している()
    {
        // テストデータ
        $data = [
            'price_range' => '2',
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertTrue($result->existsPriceRange());
    }

    /**
     * @test
     */
    public function 正常系_価格帯データが存在しているかどうか／存在していない()
    {
        // テストデータ
        $data = [
            'price_range' => '1',
            'simple' => '1',
        ];

        // テストするクラスを読み込み
        $result = new SpotSearch($data, '');

        $this->assertFalse($result->existsPriceRange());
    }

    /**
     * @test
     */
    public function 正常系_ソートが存在しているか／存在している()
    {
        // テストするクラスを読み込み
        $result = new SpotSearch([], 'id');

        $this->assertTrue($result->existsSort());
    }

    /**
     * @test
     */
    public function 正常系_ソートが存在しているか／存在していない()
    {
        // テストするクラスを読み込み
        $result = new SpotSearch([], '');

        $this->assertFalse($result->existsSort());
    }

    /**
     * @test
     */
    public function 正常系_カテゴリソートが存在しているか／存在している()
    {
        // テストするクラスを読み込み
        $result = new SpotSearch([], 'category_id');

        $this->assertTrue($result->existsCategorySort());
    }

    /**
     * @test
     */
    public function 正常系_カテゴリソートが存在しているか／存在していない()
    {
        // テストするクラスを読み込み
        $result = new SpotSearch([], '');

        $this->assertFalse($result->existsCategorySort());
    }

    /**
     * @test
     */
    public function 正常系_地域包括ソートが存在しているか／存在している()
    {
        // テストするクラスを読み込み
        $result = new SpotSearch([], 'area_center_id');

        $this->assertTrue($result->existsAreaCenterSort());
    }

    /**
     * @test
     */
    public function 正常系_地域包括ソートが存在しているか／存在していない()
    {
        // テストするクラスを読み込み
        $result = new SpotSearch([], '');

        $this->assertFalse($result->existsAreaCenterSort());
    }

    /**
     * @test
     */
    public function 正常系_登録順ソートが存在しているか／存在している()
    {
        // テストするクラスを読み込み
        $result = new SpotSearch([], 'id');

        $this->assertTrue($result->existsIdSort());
    }

    /**
     * @test
     */
    public function 正常系_登録順ソートが存在しているか／存在していない()
    {
        // テストするクラスを読み込み
        $result = new SpotSearch([], '');

        $this->assertFalse($result->existsIdSort());
    }
}
