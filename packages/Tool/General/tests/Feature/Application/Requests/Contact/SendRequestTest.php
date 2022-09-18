<?php

namespace Tool\General\tests\Feature\Application\Requests\Contact;

use Tool\General\tests\TestCase;
use Tool\General\Application\Requests\Contact\SendRequest;
use Illuminate\Support\Facades\Validator;

class SendRequestTest extends TestCase
{
    /**
     * @test
     * @dataProvider dataProvider
     */
    public function バリデーションテスト(string $column, mixed $data, bool $expected): void
    {
        // リクエストオブジェクトを作成
        $request = new SendRequest();

        // 配列ではテストが通らないため、キーのモデル名を取り除いた独自のルールを作成
        $rules = [];
        foreach ($request->rules() as $key => $value) {
            $key2 = str_replace('contact.', '', $key);
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
            'kana成功' => ['kana', 'なまえ', true],
            'kana失敗-空' => ['kana', null, false],
            'email成功' => ['email', 'test@hoge.co.jp', true],
            'email失敗-email形式じゃない' => ['email', 'fdsalfjdlsa', false],
            'tel成功' => ['tel', '電話番号', true],
            'tel失敗-空' => ['tel', null, false],
            'reply成功' => ['reply', '返答方法', true],
            'reply失敗-空白' => ['reply', '', false],
            'reply失敗-空' => ['reply', null, false],
            'msg成功' => ['msg', 'お問い合わせ内容', true],
            'msg失敗-空白' => ['msg', '', false],
            'msg失敗-空' => ['msg', null, false],
            'privacy成功' => ['privacy', '0', true],
            'privacy成功2' => ['privacy', '1', true],
            'privacy失敗-空白' => ['privacy', '', false],
            'privacy失敗-空' => ['privacy', null, false],
            'privacy失敗-数値以外' => ['privacy', 'a', false],
            'privacy失敗-2以上' => ['privacy', '2', false],
        ];
    }
}
