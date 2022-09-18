<?php

namespace Tool\User\tests\Feature\Application\Requests\Company;

use Tool\User\tests\TestCase;
use Tool\User\Application\Requests\Company\UpdateRequest;
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
            $key2 = str_replace('company.', '', $key);
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
            'name成功' => ['name', '法人名', true],
            'name失敗-空白' => ['name', '', false],
            'name失敗-空' => ['name', null, false],
            'longname成功' => ['longname', '正式法人名', true],
            'longname失敗-空' => ['longname', null, false],
            'kana成功' => ['kana', 'ほうじんめい', true],
            'kana失敗-空' => ['kana', null, false],
            'email成功' => ['email', 'test@hoge.co.jp', true],
            'email失敗-email形式じゃない' => ['email', 'fdsalfjdlsa', false],
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
            'fax成功' => ['fax', 'FAX', true],
            'fax失敗-空' => ['fax', null, false],
            'lat成功' => ['lat', '43.00000', true],
            'lat失敗-空白' => ['lat', '', false],
            'lat失敗-空' => ['lat', null, false],
            'lng成功' => ['lng', '143.00000', true],
            'lng失敗-空白' => ['lng', '', false],
            'lng失敗-空' => ['lng', null, false],
            'msg成功' => ['msg', 'コメント', true],
            'msg失敗-空' => ['msg', null, false],
            'start成功' => ['start', '開始日', true],
            'start失敗-空' => ['start', null, false],
            'president成功' => ['president', '代表者', true],
            'president失敗-空' => ['president', null, false],
            'history成功' => ['history', '沿革', true],
            'history失敗-空' => ['history', null, false],
            'staff成功' => ['staff', 'スタッフ', true],
            'staff失敗-空' => ['staff', null, false],
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
        ];
    }
}
