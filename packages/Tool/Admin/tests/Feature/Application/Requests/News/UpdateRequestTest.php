<?php

namespace Tool\Admin\tests\Feature\Application\Requests\News;

use Tool\Admin\tests\TestCase;
use Tool\Admin\Application\Requests\News\UpdateRequest;
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
            $key2 = str_replace('news.', '', $key);
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
            'body成功' => ['body', '本文', true],
            'body失敗-空' => ['body', null, false],
            'url成功' => ['url', '関連URL', true],
            'url失敗-空' => ['url', null, false],
        ];
    }
}
