<?php

namespace Tool\Admin\tests\Feature\Application\Requests\Spot;

use Tool\Admin\tests\TestCase;
use Illuminate\Support\Facades\Validator;
use Tool\Admin\Application\Requests\Spot\StoreRequest;
use Tool\Admin\tests\RefreshDatabaseLite;

class StoreRequestTest extends TestCase
{
    use RefreshDatabaseLite;

    /**
     * @test
     * @dataProvider dataProvider
     */
    public function バリデーションテスト(string $column, mixed $data, bool $expect): void
    {
        $request = new StoreRequest();

        // 配列ではテストが通らないため、キーのモデル名を取り除いた独自のルールを作成
        $rules = [];
        foreach($request->rules() as $key2 => $value2) {
            $key3 = str_replace('spot.', '', $key2);
            $rules[$key3] = $value2;
        }

        // チェックするカラムだけにする
        $rule[$column] = $rules[$column];

        // バリデーションチェック
        $result = Validator::make([$column => $data], $rule)->passes();

        // 評価
        $this->assertSame($expect, $result);
    }

    /**
     * @codeCoverageIgnore
     *
     * テストデータ
     */
    public function dataProvider(): array
    {
        return [
            'name成功' => ['name', '事業所名', true],
            'name失敗-空白' => ['name', '', false],
            'name失敗-空' => ['name', null, false],
        ];
    }
}
