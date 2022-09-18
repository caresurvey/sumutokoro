<?php

namespace Tool\User\Infrastructure\Repositories\Domain\Eloquent;

use Tool\User\Domain\Models\SpotImage\SpotImageRepository;
use Tool\User\Domain\Models\Upload\UploadSpotImage;
use Tool\User\Infrastructure\Eloquents\EloquentSpotImage;
use Tool\User\Exceptions\UserLogicException;
use Tool\Common\Helpers\LogHelper;
use Tool\Common\Infrastructure\Eloquents\EloquentLog;
use DB;

class EloquentSpotImageRepository implements SpotImageRepository
{
    private EloquentLog $eloquentLog;
    private EloquentSpotImage $eloquentSpotImage;
    private UploadSpotImage $uploadSpotImage;

    public function __construct(
        EloquentSpotImage $eloquentSpotImage,
        EloquentLog       $eloquentLog,
        UploadSpotImage   $uploadSpotImage
    )
    {
        $this->eloquentLog = $eloquentLog;
        $this->eloquentSpotImage = $eloquentSpotImage;
        $this->uploadSpotImage = $uploadSpotImage;
    }

    public function save(int $id, array $post, array $auth): bool
    {
        // アップロードデータがなければ何もしないで返す
        if (empty($post['photo']['upload'])) return true;

        // 画像データ更新
        $post['photo']['display'] = 1;
        $post['photo']['name'] = $id . '_test';
        $post['photo']['tag'] = 'main';
        $post['photo']['msg'] = '';
        $post['photo']['reorder'] = 1;
        $post['photo']['spot_id'] = $id;

        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($post, $auth) {

                // モデルオブジェクト作成
                $data = new EloquentSpotImage();

                // DB保存
                if (!$data->fill($post['photo'])->save()) throw new UserLogicException();

                // 画像ファイルの保存
                if (!$this->uploadSpotImage->upload($post['photo'])) throw new UserLogicException();

                // ログの保存
                $log = LogHelper::makeLogData($post, 'admin', 'spot_image', 'save', $data->id, $data->name . 'を変更しました', $auth);
                if (!$this->eloquentLog->fill($log)->save()) throw new UserLogicException();

                // 成功したらtrueを返す
                return true;
            });
        } catch (UserLogicException $e) {
            // ログ書き込み
            Logger($e->getMessage());
            // 失敗したらfalseを返す
            return false;
        }
    }

    public function remove(int $id, array $post, array $auth): bool
    {
        // deleteのidがなければなにもしないで返す
        if (empty($post['photo']['delete']['id'])) return true;

        // deleteのon要素が0ならなにもしないで返す
        if ($post['photo']['delete']['on'] === '0') return true;

        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($post, $auth) {
                // データ取得
                $data = $this->eloquentSpotImage->where('id', $post['photo']['delete']['id'])->first();

                // 削除するデータを取得して削除し、結果を返す
                if (!$data->delete()) throw new UserLogicException();

                // 画像ファイルの削除
                if (!$this->uploadSpotImage->remove($post['photo']['delete']['name'])) throw new UserLogicException();

                // ログの保存
                $log = LogHelper::makeLogData($post, 'admin', 'spot_image', 'remove', $data->id, $data->name . 'を変更しました', $auth);
                if (!$this->eloquentLog->fill($log)->save()) throw new UserLogicException();

                // 成功したらtrueを返す
                return true;
            });
        } catch (UserLogicException $e) {
            // ログ書き込み
            Logger($e->getMessage());
            // 失敗したらfalseを返す
            return false;
        }
    }
}
