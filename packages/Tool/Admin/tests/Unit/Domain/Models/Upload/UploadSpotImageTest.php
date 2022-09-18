<?php

namespace Tool\Admin\tests\Unit\Domain\Models\Upload;

use Tests\TestCase;
use Tool\Admin\Domain\Models\Upload\UploadSpotImage;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpot;
use Tool\Admin\tests\TestData;

class UploadSpotImageTest extends TestCase
{
    private EloquentSpot $eloquentSpot;

    public function setUp(): void
    {
        parent::setUp();

        $this->eloquentSpot = app()->make(EloquentSpot::class);

        // テストデータ作成
        $this->testData = new TestData('photos/spots');
    }

    /**
     * @test
     */
    public function save()
    {
        // テストモデル作成
        $uploadSpotImage = new UploadSpotImage();

        // テストデータ
        $spot = $this->eloquentSpot->orderBy('id', 'desc')->first();
        $post['upload'] = $this->testData->base64();
        $post['name'] = $spot->id . '_test';

        // テストアップロード
        $result = $uploadSpotImage->upload($post);

        // チェック
        $this->assertTrue($result);

        // テストファイルを削除
        $this->testData->removeTestFile($post['name']);
    }
}
