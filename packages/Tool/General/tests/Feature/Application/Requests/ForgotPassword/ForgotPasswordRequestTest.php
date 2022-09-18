<?php

namespace Tool\General\tests\Feature\Application\Requests\ForgotPassword;

use Tool\General\tests\TestCase;
use Tool\General\Application\Requests\ForgotPassword\ForgotPasswordRequest;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordRequestTest extends TestCase
{
    /**
     * @test
     * @dataProvider dataProvider
     */
    public function バリデーションテスト(string $column, mixed $data, bool $expected): void
    {
        // リクエストオブジェクトを作成
        $request = new ForgotPasswordRequest();

        // バリデーションチェック
        $result = Validator::make([$column => $data], $request->rules())->passes();

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
            'email成功' => ['email', 'user@hoge.co.jp', true],
            'email失敗-空白' => ['email', '', false],
            'email失敗-空' => ['email', null, false],
            'email失敗-email形式じゃない' => ['email', 'fdsalfjdlsa', false],
            'email失敗-メールが存在しない' => ['email', 'nothing@hoge.co.jp', false],
        ];
    }
}
