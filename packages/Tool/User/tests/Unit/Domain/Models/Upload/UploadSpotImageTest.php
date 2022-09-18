<?php

namespace Tool\User\tests\Unit\Domain\Models\Upload;

use Tool\User\tests\TestCase;
use Tool\User\Domain\Models\Upload\UploadSpotImage;
use Tool\User\Infrastructure\Eloquents\EloquentSpot;
use Tool\User\tests\TestData;

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
