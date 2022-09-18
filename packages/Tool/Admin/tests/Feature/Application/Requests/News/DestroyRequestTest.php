<?php

namespace Tool\Admin\tests\Feature\Application\Requests\News;

use Tool\Admin\tests\TestCase;
use Tool\Admin\Application\Requests\News\DestroyRequest;
use Illuminate\Support\Facades\Validator;

class DestroyRequestTest extends TestCase
{
    /**
     * @test
     * @dataProvider dataProvider
     */
    public function バリデーションテスト(string $column, mixed $data, bool $expected): void
    {
        // リクエストオブジェクトを作成
        $request = new DestroyRequest();

        // 配列ではテストが通らないため、キーのモデル名を取り除いた独自のルールを作成
        $rules = [];
        foreach ($request->rules() as $key => $value) {
            $key2 = str_replace('news_delete.', '', $key);
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
            'code成功' => ['code', 'delete_code', true],
            'code失敗-空白' => ['code', '', false],
            'code失敗-空' => ['code', null, false],
            'confirmation失敗-空白' => ['confirmation', '', false],
            'confirmation失敗-不一致' => ['confirmation', 'delete_code_2', false],
            'confirmation失敗-空' => ['confirmation', null, false],
        ];
    }
}
