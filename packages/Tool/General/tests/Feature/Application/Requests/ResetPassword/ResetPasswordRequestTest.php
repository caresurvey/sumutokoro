<?php

namespace Tool\General\tests\Feature\Application\Requests\ResetPassword;

use Tool\General\tests\TestCase;
use Tool\General\Application\Requests\ResetPassword\ResetPasswordRequest;
use Illuminate\Support\Facades\Validator;

class ResetPasswordRequestTest extends TestCase
{
    /**
     * @test
     * @dataProvider dataProvider
     */
    public function バリデーションテスト(string $column, mixed $data, bool $expected): void
    {
        // リクエストオブジェクトを作成
        $request = new ResetPasswordRequest();

        // チェックするカラムだけにする
        $rule[$column] = $request->rules()[$column];

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
            'id失敗-0' => ['id', '0', false],
            'id失敗-数値以外' => ['id', 'a', false],
            'password成功' => ['password', 'password', true],
            'password失敗-空白' => ['password', '', false],
            'password失敗-空' => ['password', null, false],
            'password_confirm失敗-空白' => ['password_confirm', '', false],
            'password_confirm失敗-空' => ['password_confirm', null, false],
            'password_confirm失敗-パスワードが一致しない' => ['password_confirm', 'difference', false],
            'token成功' => ['token', 'token', true],
            'token失敗-空白' => ['token', '', false],
            'token失敗-空' => ['token', null, false],
        ];
    }
}
