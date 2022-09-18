<?php

namespace Tool\User\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Tool\User\Domain\Models\Common\LogicResponse;
use Tool\User\Domain\Models\Spot\SpotRepository;
use Tool\User\Exceptions\UserNotFoundException;
use Tool\User\Exceptions\UserLogicException;
use Tool\User\Infrastructure\Eloquents\EloquentSpot;
use Tool\User\Infrastructure\Eloquents\EloquentSpotIconStatusForUpdate;
use Tool\User\Infrastructure\Eloquents\EloquentSpotPriceForUpdate;
use Tool\User\Infrastructure\Eloquents\EloquentSpotUser;
use Tool\User\Infrastructure\Repositories\Domain\Logic\LogicResponseRepository;
use Tool\Common\Helpers\LogHelper;
use Tool\Common\Infrastructure\Eloquents\EloquentLog;
use DB;

class EloquentSpotRepository implements SpotRepository
{
    private EloquentLog $eloquentLog;
    private EloquentSpotIconStatusForUpdate $eloquentSpotIconStatusForUpdate;
    private EloquentSpot $eloquentSpot;
    private EloquentSpotUser $eloquentSpotUser;
    private EloquentSpotPriceForUpdate $eloquentSpotPriceForUpdate;
    private EloquentSpotImageRepository $spotImageRepo;
    private LogicResponseRepository $responseRepo;
    private int $limit = 30;

    public function __construct(
        EloquentLog                     $eloquentLog,
        EloquentSpotIconStatusForUpdate $eloquentSpotIconStatusForUpdate,
        EloquentSpot                    $eloquentSpot,
        EloquentSpotUser                $eloquentSpotUser,
        EloquentSpotPriceForUpdate      $eloquentSpotPriceForUpdate,
        EloquentSpotImageRepository     $spotImageRepo,
        LogicResponseRepository         $responseRepo
    )
    {
        $this->eloquentLog = $eloquentLog;
        $this->eloquentSpotIconStatusForUpdate = $eloquentSpotIconStatusForUpdate;
        $this->eloquentSpot = $eloquentSpot;
        $this->eloquentSpotUser = $eloquentSpotUser;
        $this->eloquentSpotPriceForUpdate = $eloquentSpotPriceForUpdate;
        $this->responseRepo = $responseRepo;
        $this->spotImageRepo = $spotImageRepo;
    }

    public function list(array $auth): array
    {
        // 認証してなければデータを読み込まない
        if($auth['is_authenticated'] === 0) return ['totalCount' => 0];

        // Userに関連したSpotIdだけを取得する
        $spotIds = $this->eloquentSpotUser->where('user_id', $auth['id'])->pluck('spot_id');

        // ページネートオブジェクトを作成
        $query = $this->eloquentSpot::query();

        // ソート機能追加
        $query->sortable();

        // 検索条件
        $query->whereIn('id', $spotIds);

        // ベースの並び
        $query->orderBy('created_at', 'DESC');
        $query->orderBy('id', 'DESC');

        // リレーション
        $query->with('user');
        $query->withCount('category', 'spot_main_image');

        // 現在のページを取得
        $current = Paginator::resolveCurrentPage();

        // 取得開始の件数を割り出す
        $skip = ($this->limit * $current) - $this->limit;

        // 検索結果の件数を取得
        $totalCount = $query->count();

        // 1ページ分のデータを取得
        $list = $query->skip($skip)->take($this->limit)->get();

        // ページネートを生成
        $data = new LengthAwarePaginator($list, $totalCount, $this->limit, $current, array('path' => config('myapp.app_path') . '/user/spot/'));

        // データを返す
        return [
            'spots' => $data->items(),
            'current' => $current,
            'totalCount' => $totalCount,
            'limit' => $this->limit,
            'fullPage' => (int)ceil($totalCount / $this->limit),
            'linkTag' => $data->links('vendor.pagination.default')->toHtml()
        ];
    }

    public function edit(int $id, array $auth): array
    {
        // Userに関連したSpotIdだけを取得し、データがなければエラーを返す
        if($this->eloquentSpotUser->where('spot_id', $id)->where('user_id', $auth['id'])->count() <= 0) throw new UserNotFoundException();

        // 必要データの取得
        $data = $this->eloquentSpot->where('id', $id)
            ->with(
                'category',
                'city',
                'company',
                'prefecture',
                'spot_detail',
                'spot_main_image',
                'spot_icon_genre_comments',
                'spot_plan',
                'spot_prices.price_genre',
                'space',
                'user'
            )
            ->withCount('spot_images')
            ->first();

        // データがない場合
        if (empty($data)) throw new UserNotFoundException();

        // データがあれば返す
        return $data->toArray();
    }

    public function update(array $request, array $auth): LogicResponse
    {
        // Userに関連したSpotIdだけを取得し、データがなければエラーを返す
        if($this->eloquentSpotUser->where('spot_id', $request['spot']['id'])->where('user_id', $auth['id'])->count() <= 0) throw new UserNotFoundException();

        // POSTデータを取得
        $post = $request;
        $post['spot']['search_words'] = $request['search_words'];
        $post['spot']['user_id'] = $auth['id'];

        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($post, $auth) {

                // spotデータ更新
                $data = $this->eloquentSpot->where('id', $post['spot']['id'])->first();
                if (!$data->fill($post['spot'])->save()) throw new UserLogicException();

                // spot_detail更新
                if (!$data['spot_detail']->fill($post['spot']['spot_detail'])->save()) throw new UserLogicException();

                // spot_icon_status更新
                foreach ($post['icons'] as $icon) {
                    $spotIconStatusData = $this->eloquentSpotIconStatusForUpdate->where('id', $icon['id'])->where('spot_id', $data->id)->first();
                    $spotIconStatusData->spot_icon_type_id = $icon['spot_icon_type_id'];
                    $spotIconStatusData->spot_icon_genre_id = $icon['spot_icon_genre_id'];
                    $spotIconStatusData->user_id = $post['spot']['user_id'];
                    if (!$spotIconStatusData->save()) throw new UserLogicException();
                }

                // spot_prices更新
                foreach ($post['prices'] as $price) {
                    $spotPriceData = $this->eloquentSpotPriceForUpdate->where('id', $price['id'])->where('spot_id', $data->id)->first();
                    $spotPriceData->name = $price['name'];
                    $spotPriceData->user_id = $post['spot']['user_id'];
                    if (!$spotPriceData->save()) throw new UserLogicException();
                }

                // 画像をアップロード
                if (!$this->spotImageRepo->save($data->id, $post, $auth)) throw new UserLogicException();

                // 画像データの削除
                if (!$this->spotImageRepo->remove($data->id, $post, $auth)) throw new UserLogicException();

                // ログの保存
                $log = LogHelper::makeLogData($post, 'user', 'spot', 'update', $data->id, $data->name . 'を変更しました', $auth);
                if (!$this->eloquentLog->fill($log)->save()) throw new UserLogicException();

                // レスポンスモデルを作成して返す
                return $this->responseRepo->makeModel(true, '', $data->name . 'を変更しました');
            });
        } catch (UserLogicException $e) {
            Logger($e->getMessage());
            // レスポンスモデルを作成して返す
            return $this->responseRepo->makeModel(false, '', '変更できませんでした');
        }
    }

    public function display(int $id, array $auth): LogicResponse
    {
        // Userに関連したSpotIdだけを取得し、データがなければエラーを返す
        if($this->eloquentSpotUser->where('spot_id', $id)->where('user_id', $auth['id'])->count() <= 0) throw new UserNotFoundException();

        // 変更するデータを取得
        $data = $this->eloquentSpot->where('id', $id)->first();

        // データが無かったらレスポンスモデルをエラーで作成して返す
        if (empty($data)) return $this->responseRepo->makeModel(false, '', $data->name . 'の表示を変更できませんでした', $auth);

        // 切り替え
        if ($data->display === 0) {
            $data->display = 1;
            $message = $data->name . 'を表示にしました';
        } else {
            $data->display = 0;
            $message = $data->name . 'を非表示にしました';
        }

        // ユーザー書き換え
        $data->user_id = $auth['id'];

        // データを保存
        $data->save();

        // ログの保存
        $log = LogHelper::makeLogData($data->toArray(), 'user', 'spot', 'display', $data->id, $message, $auth);
        if (!$this->eloquentLog->fill($log)->save()) throw new UserLogicException();

        // レスポンスモデルを作成して返す
        return $this->responseRepo->makeModel(true, '', $message);
    }

    public function count(): int
    {
        return $this->eloquentSpot->count();
    }
}
