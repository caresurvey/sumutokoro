<?php

namespace Tool\User\tests\Feature\Application\Requests\User;

use Tool\User\tests\TestCase;
use Tool\User\Application\Requests\User\UpdateRequest;
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
            $key2 = str_replace('user.', '', $key);
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
            'name成功' => ['name', '法人名', true],
            'name失敗-空白' => ['name', '', false],
            'name失敗-空' => ['name', null, false],
            'kana成功' => ['kana', 'ほうじんめい', true],
            'kana失敗-空' => ['kana', null, false],
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
            'email成功' => ['email', 'test@hoge.co.jp', true],
            'email失敗-email形式じゃない' => ['email', 'fdsalfjdlsa', false],
            'email失敗-空白' => ['email', '', false],
            'email失敗-空' => ['email', null, false],
            'company成功' => ['company', '所属事業所・法人', true],
            'company失敗-空' => ['company', null, false],
            'msg成功' => ['msg', 'コメント', true],
            'msg失敗-空' => ['msg', null, false],
            'city_id成功' => ['city_id', 1, true],
            'city_id失敗-範囲外' => ['city_id', '0', false],
            'city_id失敗-空白' => ['city_id', '', false],
            'city_id失敗-空' => ['city_id', null, false],
            'city_id失敗-数値以外' => ['city_id', 'a', false],
            'job_type_id成功' => ['job_type_id', '1', true],
            'job_type_id失敗-範囲外' => ['job_type_id', '0', false],
            'job_type_id失敗-空白' => ['job_type_id', '', false],
            'job_type_id失敗-空' => ['job_type_id', null, false],
            'job_type_id失敗-数値以外' => ['job_type_id', 'a', false],
            'prefecture_id成功' => ['prefecture_id', '1', true],
            'prefecture_id失敗-範囲外' => ['prefecture_id', '0', false],
            'prefecture_id失敗-空白' => ['prefecture_id', '', false],
            'prefecture_id失敗-空' => ['prefecture_id', null, false],
            'prefecture_id失敗-数値以外' => ['prefecture_id', 'a', false],
            'user_type_id成功' => ['user_type_id', 1, true],
            'user_type_id失敗-範囲外' => ['user_type_id', '0', false],
            'user_type_id失敗-空白' => ['user_type_id', '', false],
            'user_type_id失敗-空' => ['user_type_id', null, false],
            'user_type_id失敗-数値以外' => ['user_type_id', 'a', false],
        ];
    }
}
