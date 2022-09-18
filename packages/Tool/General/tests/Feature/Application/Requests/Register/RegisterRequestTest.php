<?php

namespace Tool\General\tests\Feature\Application\Requests\Register;

use Tool\General\tests\TestCase;
use Tool\General\Application\Requests\Register\StoreRequest;
use Illuminate\Support\Facades\Validator;

class RegisterRequestTest extends TestCase
{
    /**
     * @test
     * @dataProvider dataProvider
     */
    public function バリデーションテスト(string $column, mixed $data, bool $expected): void
    {
        // リクエストオブジェクトを作成
        $request = new StoreRequest();

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
            'name成功' => ['name', '名前', true],
            'name失敗-空白' => ['name', '', false],
            'name失敗-空' => ['name', null, false],
            'kana成功' => ['kana', 'ふりがな', true],
            'kana失敗-空' => ['kana', null, false],
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
            'email成功' => ['email', 'test@hoge.co.jp', true],
            'email失敗-空白' => ['email', '', false],
            'email失敗-空' => ['email', null, false],
            'email失敗-email形式じゃない' => ['email', 'fdsalfjdlsa', false],
            'password成功' => ['password', 'password', true],
            'password失敗-空白' => ['password', '', false],
            'password失敗-空' => ['password', null, false],
            'password_confirm失敗-空白' => ['password_confirm', '', false],
            'password_confirm失敗-空' => ['password_confirm', null, false],
            'password_confirm失敗-パスワードが一致しない' => ['password_confirm', 'difference', false],
            'job_type_id成功' => ['job_type_id', '1', true],
            'job_type_id失敗-空白' => ['job_type_id', '', false],
            'job_type_id失敗-空' => ['job_type_id', null, false],
            'job_type_id失敗-数値以外' => ['job_type_id', 'a', false],
            'user_type_id成功' => ['user_type_id', '1', true],
            'user_type_id失敗-空白' => ['user_type_id', '', false],
            'user_type_id失敗-空' => ['user_type_id', null, false],
            'user_type_id失敗-数値以外' => ['user_type_id', 'a', false],
            'msg成功' => ['msg', 'msg', true],
            'msg失敗-空' => ['msg', null, false],
        ];
    }
}
