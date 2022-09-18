<?php

namespace Tool\User\tests\Feature\Application\Requests\Spot;

use Tool\User\tests\TestCase;
use Tool\User\Application\Requests\Spot\UpdateRequest;
use Illuminate\Support\Facades\Validator;

class UpdateRequestTest extends TestCase
{
    /**
     * @test
     * @dataProvider dataProvider
     */
    public function バリデーションテスト(string $column, mixed $data, bool $expected): void
    {
        // リクエストオブジェクトを作成
        $request = new UpdateRequest();

        // 配列ではテストが通らないため、キーのモデル名を取り除いた独自のルールを作成
        $rules = [];
        foreach ($request->rules() as $key => $value) {
            $key2 = str_replace('spot.', '', $key);
            $rules[$key2] = $value;
        }

        // チェックするカラムだけにする
        $rule[$column] = $rules[$column];

        // バリデーションチェック
        $result = Validator::make([$column => $data], $rule)->passes();

        // 評価
        $this->assertSame($expected, $result);
    }

    /**
     * @codeCoverageIgnore
     *
     * テストデータ
     */
    public function dataProvider(): array
    {
        return [
            'id成功' => ['id', '1', true],
            'id失敗-空白' => ['id', '', false],
            'id失敗-空' => ['id', null, false],
            'id失敗-数値以外' => ['id', 'a', false],
            'display成功' => ['display', '0', true],
            'display成功2' => ['display', '1', true],
            'display失敗-空白' => ['display', '', false],
            'display失敗-空' => ['display', null, false],
            'display失敗-数値以外' => ['display', 'a', false],
            'display失敗-2以上' => ['display', '2', false],
            'preview成功' => ['preview', '0', true],
            'preview成功2' => ['preview', '1', true],
            'preview失敗-空白' => ['preview', '', false],
            'preview失敗-空' => ['preview', null, false],
            'preview失敗-数値以外' => ['preview', 'a', false],
            'preview失敗-2以上' => ['preview', '2', false],
            'name成功' => ['name', '事業所名', true],
            'name失敗-空白' => ['name', '', false],
            'name失敗-空' => ['name', null, false],
            'zip1成功' => ['zip1', '070', true],
            'zip1失敗-空白' => ['zip1', null, false],
            'zip1失敗-文字数オーバー' => ['zip1', '0700', false],
            'zip1失敗-数値以外' => ['zip1', 'a', false],
            'zip2成功' => ['zip2', '0000', true],
            'zip2失敗-空白' => ['zip2', null, false],
            'zip2失敗-文字数オーバー' => ['zip2', '00111', false],
            'zip2失敗-数値以外' => ['zip2', 'a', false],
            'address成功' => ['address', '住所', true],
            'address失敗-空' => ['address', null, false],
            'tel1成功' => ['tel1', '090', true],
            'tel1失敗-空白' => ['tel1', null, false],
            'tel1失敗-文字数オーバー' => ['tel1', '090090', false],
            'tel1失敗-数値以外' => ['tel1', 'a', false],
            'tel2成功' => ['tel2', '090', true],
            'tel2失敗-空白' => ['tel2', null, false],
            'tel2失敗-文字数オーバー' => ['tel2', '090090', false],
            'tel2失敗-数値以外' => ['tel2', 'a', false],
            'tel3成功' => ['tel3', '090', true],
            'tel3失敗-空白' => ['tel3', null, false],
            'tel3失敗-文字数オーバー' => ['tel3', '090090', false],
            'tel3失敗-数値以外' => ['tel3', 'a', false],
            'vacancy成功' => ['vacancy', '1', true],
            'vacancy失敗-範囲外' => ['vacancy', '0', false],
            'vacancy失敗-空白' => ['vacancy', '', false],
            'vacancy失敗-空' => ['vacancy', null, false],
            'document成功' => ['document', '1', true],
            'document失敗-範囲外' => ['document', '0', false],
            'document失敗-空白' => ['document', '', false],
            'document失敗-空' => ['document', null, false],
            'viewing成功' => ['viewing', '1', true],
            'viewing失敗-範囲外' => ['viewing', '0', false],
            'viewing失敗-空白' => ['viewing', '', false],
            'viewing失敗-空' => ['viewing', null, false],
            'is_book成功' => ['is_book', '0', true],
            'is_book成功2' => ['is_book', '1', true],
            'is_book失敗-空白' => ['is_book', '', false],
            'is_book失敗-空' => ['is_book', null, false],
            'is_book失敗-数値以外' => ['is_book', 'a', false],
            'is_book失敗-2以上' => ['is_book', '2', false],
            'heading成功' => ['heading', '住所', true],
            'heading失敗-空' => ['heading', null, false],
            'message成功' => ['message', '住所', true],
            'message失敗-空' => ['message', null, false],
            'monthly_price_min成功' => ['monthly_price_min', '1000', true],
            'monthly_price_min成功_0' => ['monthly_price_min', '0', true],
            'monthly_price_min失敗_空' => ['monthly_price_min', null, false],
            'monthly_price_min失敗-数字以外' => ['monthly_price_min', 'a', false],
            'for_check_monthly成功' => ['for_check_monthly', '1', true],
            'for_check_monthly失敗-空白' => ['for_check_monthly', '', false],
            'for_check_monthly失敗-空' => ['for_check_monthly', null, false],
            'for_check_monthly失敗-数値以外' => ['for_check_monthly', 'a', false],
            'monthly_price_max成功' => ['monthly_price_max', '1000', true],
            'monthly_price_max成功_0' => ['monthly_price_max', '0', true],
            'monthly_price_max失敗-空' => ['monthly_price_max', null, false],
            'monthly_price_max失敗-数字以外' => ['monthly_price_max', 'a', false],
            'for_check_movein成功' => ['for_check_movein', '1', true],
            'for_check_movein失敗-空白' => ['for_check_movein', '', false],
            'for_check_movein失敗-空' => ['for_check_movein', null, false],
            'for_check_movein失敗-数値以外' => ['for_check_movein', 'a', false],
            'is_selfpay成功' => ['is_selfpay', '1', true],
            'is_selfpay失敗-空白' => ['is_selfpay', '', false],
            'is_selfpay失敗-空' => ['is_selfpay', null, false],
            'is_selfpay失敗-数値以外' => ['is_selfpay', 'a', false],
            'room_size成功' => ['room_size', '部屋サイズ', true],
            'room_size失敗-空' => ['room_size', null, false],
            'lat成功' => ['lat', '43.00000', true],
            'lat失敗-空白' => ['lat', '', false],
            'lat失敗-空' => ['lat', null, false],
            'lng成功' => ['lng', '143.00000', true],
            'lng失敗-空白' => ['lng', '', false],
            'lng失敗-空' => ['lng', null, false],
            'category_id成功' => ['category_id', '1', true],
            'category_id失敗-範囲外' => ['category_id', '0', false],
            'category_id失敗-空白' => ['category_id', '', false],
            'category_id失敗-空' => ['category_id', null, false],
            'category_id失敗-数値以外' => ['category_id', 'a', false],
            'city_id成功' => ['city_id', 1, true],
            'city_id失敗-範囲外' => ['city_id', '0', false],
            'city_id失敗-空白' => ['city_id', '', false],
            'city_id失敗-空' => ['city_id', null, false],
            'city_id失敗-数値以外' => ['city_id', 'a', false],
            'prefecture_id成功' => ['prefecture_id', '1', true],
            'prefecture_id失敗-範囲外' => ['prefecture_id', '0', false],
            'prefecture_id失敗-空白' => ['prefecture_id', '', false],
            'prefecture_id失敗-空' => ['prefecture_id', null, false],
            'prefecture_id失敗-数値以外' => ['prefecture_id', 'a', false],
            'price_range_id成功' => ['price_range_id', '1', true],
            'price_range_id失敗-範囲外' => ['price_range_id', '0', false],
            'price_range_id失敗-空白' => ['price_range_id', '', false],
            'price_range_id失敗-空' => ['price_range_id', null, false],
            'price_range_id失敗-数値以外' => ['price_range_id', 'a', false],
            'space_id成功' => ['space_id', 1, true],
            'space_id失敗-範囲外' => ['space_id', '0', false],
            'space_id失敗-空白' => ['space_id', '', false],
            'space_id失敗-空' => ['space_id', null, false],
            'space_id失敗-数値以外' => ['space_id', 'a', false],
        ];
    }
}
