<?php

namespace Tool\Admin\Domain\Models\Upload;

use Intervention\Image\Facades\Image;
use Tool\Admin\Exceptions\AdminLogicException;

/**
 * Class UploadImage
 * @package Tool\Admin\Domain\Models\Upload
 */
class UploadSpotImage
{
    private int $quality = 80;
    private string $filePath;

    public function __construct()
    {
        // 保存先ファイルパスを取得
        $this->filePath = storage_path('app/photos/spots');
    }

    public function upload(array $post): bool
    {
        // アップロードデータがなければなにもしない
        if (empty($post['upload'])) return true;

        // Base64文字列を取得して保存用に調整
        $data = str_replace(' ' , '+' , $post['upload']);
        $data = preg_replace('#^data:image/\w+;base64,#i' , '' , $data);

        // 保存ファイル名を取得
        $fileName = $post['name'];

        // ファイルパスを指定
        $filePath = $this->filePath . '/' . $post['name'];

        // 画像を保存
        return $this->uploadSpotImage($data, $filePath, $fileName);
    }

    /**
     * @params string
     * @return boolean
     */
    public function uploadSpotImage(string $data, string $filePath, string $fileName): bool
    {
        // デコード
        $fileData = base64_decode($data);

        // 画像ファイルの保存
        try {
            // ディレクトリを作成
            $this->makeDir($filePath);

            // 圧縮して保存する
            $this->resizeAndSave($fileData, $filePath . '/' . $fileName . '_2l.jpg', 1200);
            $this->resizeAndSave($fileData, $filePath . '/' . $fileName . '_l.jpg', 800);
            $this->resizeAndSave($fileData, $filePath . '/' . $fileName . '_m.jpg', 600);
            $this->resizeAndSave($fileData, $filePath . '/' . $fileName . '_s.jpg', 400);

            // 成功すればtrueを返す
            return true;
        } catch (AdminLogicException $e) {
            // エラー書き込み
            Logger($e->getMessage());
            // 失敗すればfalseを返す
            return false;
        }
    }

    /**
     * ディレクトリを作成
     * @param $filePath
     * @return bool
     */
    public function makeDir($filePath): bool
    {
        // ディレクトリがあればなにもしない
        if (file_exists($filePath) === true) return false;

        // ディレクトリがなければ作成する
        mkdir($filePath);

        // trueを返す
        return true;
    }

    /**
     * 写真をリサイズして保存
     * @params string
     * @return boolean
     */
    public function resizeAndSave(string $fileData, string $filePath, int $width): bool
    {
        try {
            // 画像オブジェクト生成
            $img = Image::make($fileData);

            // 比率を保ったままリサイズ
            $img->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            // クォリティを指定して保存
            $img->save($filePath, $this->quality);

            // 問題なければtrue
            return true;

        } catch (\Exception $e) {
            // ログに書き込む
            logger($e);
            // 問題あればfalse
            return false;
        }
    }

    /**
     * 写真を削除
     * @param string
     * @return string
     */
    public function remove(string $fileName): bool
    {
        // ファイルパスを指定
        $filePath = $this->filePath . '/';

        try {
            $fileDir = $filePath . $fileName;
            $filePath1 = $filePath . $fileName . '/' .  $fileName . '_2l.jpg';
            $filePath2 = $filePath . $fileName . '/' .  $fileName . '_l.jpg';
            $filePath3 = $filePath . $fileName . '/' .  $fileName . '_m.jpg';
            $filePath4 = $filePath . $fileName . '/' .  $fileName . '_s.jpg';
            unlink($filePath1);
            unlink($filePath2);
            unlink($filePath3);
            unlink($filePath4);
            rmdir($fileDir);

            return true;
        } catch (\Exception $e) {
            logger($e);
            return false;
        }
    }
}
