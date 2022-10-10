<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\Spot\SpotRepository;
use Tool\Admin\Domain\Models\Spot\SpotSearch;
use Tool\Admin\Exceptions\AdminNotFoundException;
use Tool\Admin\Exceptions\AdminLogicException;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpot;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpotDetail;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpotIconStatusForUpdate;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpotPriceForUpdate;
use Tool\Admin\Infrastructure\Repositories\Domain\Logic\LogicResponseRepository;
use Tool\Common\Helpers\LogHelper;
use Tool\Common\Infrastructure\Eloquents\EloquentLog;
use DB;

class EloquentSpotRepository implements SpotRepository
{
    private EloquentLog $eloquentLog;
    private EloquentSpotPriceForUpdate $eloquentSpotPriceForUpdate;
    private EloquentSpotIconStatusForUpdate $eloquentSpotIconStatusForUpdate;
    private EloquentSpot $eloquentSpot;
    private EloquentSpotImageRepository $spotImageRepo;
    private LogicResponseRepository $responseRepo;
    private int $limit = 30;

    public function __construct(
        EloquentLog                     $eloquentLog,
        EloquentSpotPriceForUpdate      $eloquentSpotPriceForUpdate,
        EloquentSpotIconStatusForUpdate $eloquentSpotIconStatusForUpdate,
        EloquentSpot                    $eloquentSpot,
        EloquentSpotImageRepository     $spotImageRepo,
        LogicResponseRepository         $responseRepo
    )
    {
        $this->eloquentLog = $eloquentLog;
        $this->eloquentSpotPriceForUpdate = $eloquentSpotPriceForUpdate;
        $this->eloquentSpotIconStatusForUpdate = $eloquentSpotIconStatusForUpdate;
        $this->eloquentSpot = $eloquentSpot;
        $this->responseRepo = $responseRepo;
        $this->spotImageRepo = $spotImageRepo;
    }

    public function list(SpotSearch $search, array $auth): array
    {
        // ページネートオブジェクトを作成
        $query = $this->eloquentSpot::query();

        // ソート機能追加
        $query->sortable();

        // 条件検索ページ以外からの検索の場合の処理
        if ($search->isSimple()) {
            if ($search->existsCity()) $query->orWhere('city_id', $search->getCity());
            if ($search->existsCategory()) $query->orWhere('category_id', $search->getCategory());
            if ($search->existsPriceRange()) $query->orWhere('price_range_id', $search->getPriceRange());
            if ($search->existsKeyword()) $query->where('name', 'like', '%' . $search->getKeyword() . '%');
        }

        // ベースの並び
        $query->orderBy('created_at', 'DESC');
        $query->orderBy('id', 'DESC');

        // リレーション
        $query->with('spot_main_image', 'user');
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
        $data = new LengthAwarePaginator($list, $totalCount, $this->limit, $current, array('path' => config('myapp.app_path') . '/' . config('myapp.app_admin_prefix') . '/spot/?' . $search->getQuery()));

        // データを返す
        return [
            'spots' => $data->items(),
            'current' => $current,
            'totalCount' => $totalCount,
            'fullPage' => (int)ceil($totalCount / $this->limit),
            'limit' => $this->limit,
            'linkTag' => $data->onEachSide(1)->links('vendor.pagination.default')->toHtml()
        ];
    }

    public function store(array $request, array $emptyData, array $auth): LogicResponse
    {
        // POSTデータを取得
        $post = $request;
        $spotIconStatus = $emptyData['spotIconStatus'];
        $spotIconGenreComment = $emptyData['spotIconGenreComment'];
        $spotPrice = $emptyData['spotPrice'];
        $post['spot']['user_id'] = $auth['id'];

        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($post, $spotIconStatus, $spotIconGenreComment, $spotPrice, $auth) {

                // spot登録・失敗した場合例外を投げる
                $spot = new EloquentSpot();
                if (!$spot->fill($post['spot'])->save()) throw new AdminLogicException();

                // spot_detail登録・失敗した場合例外を投げる
                $spot_detail = new EloquentSpotDetail();
                $post['spot']['spot_detail']['spot_id'] = $spot->id;
                if (!$spot_detail->fill($post['spot']['spot_detail'])->save()) throw new AdminLogicException();

                // spot_icon_status登録・失敗した場合例外を投げる
                if (!DB::table('spot_icon_statuses')->insert($spotIconStatus->getFillData($spot->id, $post['spot']['user_id']))) throw new AdminLogicException();

                // spot_icon_genre_comment登録・失敗した場合例外を投げる
                if (!DB::table('spot_icon_genre_comments')->insert($spotIconGenreComment->getFillData($spot->id, $post['spot']['user_id']))) throw new AdminLogicException();

                // spot_price登録・失敗した場合例外を投げる
                if (!DB::table('spot_prices')->insert($spotPrice->getFillData($spot->id, $post['spot']['user_id']))) throw new AdminLogicException();

                // ログの保存
                $logPost = [$post, $spotIconGenreComment->getFillData($spot->id, $post['spot']['user_id']), $spotIconStatus->getFillData($spot->id, $post['spot']['user_id']), $spotPrice->getFillData($spot->id, $post['spot']['user_id'])];
                $log = LogHelper::makeLogData($logPost, 'admin', 'spot', 'store', $spot->id, $spot->name . 'を登録しました', $auth);
                if (!$this->eloquentLog->fill($log)->save()) throw new AdminLogicException();

                // レスポンスモデルを作成して返す
                return $this->responseRepo->makeModel(true, '', $spot->name . 'を登録しました。さらに詳しい情報を入力しましょう。', ['id' => $spot->id, 'name' => $spot->name, 'backlink' => 'spot/' . $spot->id . '/edit/']);
            });
        } catch (AdminLogicException $e) {
            Logger($e->getMessage());
            // レスポンスモデルを作成して返す
            return $this->responseRepo->makeModel(false, '', '登録できませんでした', ['backlink' => 'spot']);
        }
    }

    public function edit(int $id, array $auth): array
    {
        // 必要データの取得
        $data = $this->eloquentSpot->where('id', $id)
            ->with(
                'area_center',
                'book_spot',
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
        if (empty($data)) throw new AdminNotFoundException();

        // データがあれば返す
        return $data->toArray();
    }

    public function update(array $request, array $auth): LogicResponse
    {
        // POSTデータを取得
        $post = $request;
        $post['spot']['search_words'] = $request['search_words'];
        $post['spot']['user_id'] = $auth['id'];

        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($post, $auth) {

                // spotデータ更新
                $data = $this->eloquentSpot->where('id', $post['spot']['id'])->first();
                if (!$data->fill($post['spot'])->save()) throw new AdminLogicException();

                // spot_detail更新
                if (!$data['spot_detail']->fill($post['spot']['spot_detail'])->save()) throw new AdminLogicException();

                // spot_icon_status更新
                foreach ($post['icons'] as $icon) {
                    $spotIconStatusData = $this->eloquentSpotIconStatusForUpdate->where('id', $icon['id'])->where('spot_id', $data->id)->first();
                    $spotIconStatusData->spot_icon_type_id = $icon['spot_icon_type_id'];
                    $spotIconStatusData->spot_icon_genre_id = $icon['spot_icon_genre_id'];
                    $spotIconStatusData->user_id = $post['spot']['user_id'];
                    if (!$spotIconStatusData->save()) throw new AdminLogicException();
                }

                // spot_prices更新
                foreach ($post['prices'] as $price) {
                    $spotPriceData = $this->eloquentSpotPriceForUpdate->where('id', $price['id'])->where('spot_id', $data->id)->first();
                    $spotPriceData->name = $price['name'];
                    $spotPriceData->user_id = $post['spot']['user_id'];
                    if (!$spotPriceData->save()) throw new AdminLogicException();
                }

                // spot_book更新
                if(empty($post['spot']['books'])) $post['spot']['books'] = []; // 未選択なら空配列を渡す
                if (!$data->book_spot()->sync($post['spot']['books'])) throw new AdminLogicException();

                // 画像をアップロード
                if (!$this->spotImageRepo->save($data->id, $post, $auth)) throw new AdminLogicException();

                // 画像データの削除
                if (!$this->spotImageRepo->remove($data->id, $post, $auth)) throw new AdminLogicException();

                // ログの保存
                if (!empty($post['photo']['upload'])) $post['photo']['upload'] = '';
                $log = LogHelper::makeLogData($post, 'admin', 'spot', 'update', $data->id, $data->name . 'を変更しました', $auth);
                if (!$this->eloquentLog->fill($log)->save()) throw new AdminLogicException();

                // キャッシュクリア
                Cache::forget('spot_detail_' . $data->id);
                Cache::forget('icon_make_detail_data_' . $data->id);

                // レスポンスモデルを作成して返す
                return $this->responseRepo->makeModel(true, '', $data->name . 'を変更しました');
            });
        } catch (AdminLogicException $e) {
            Logger($e->getMessage());
            // レスポンスモデルを作成して返す
            return $this->responseRepo->makeModel(false, '', '変更できませんでした');
        }
    }

    public function display(int $id, array $auth): LogicResponse
    {
        // 変更するデータを取得
        $data = $this->eloquentSpot->where('id', $id)->first();

        // データが無かったらレスポンスモデルをエラーで作成して返す
        if (empty($data)) return $this->responseRepo->makeModel(false, '', $data->name . 'の表示を変更できませんでした');

        // 切り替え
        if ($data->display === 0) {
            $data->display = 1;
            $message = $data->name . 'を表示にしました';
        } else {
            $data->display = 0;
            $message = $data->name . 'を非表示にしました';
        }

        // ログの保存
        $log = LogHelper::makeLogData($data->toArray(), 'admin', 'spot', 'display', $data->id, $message, $auth);
        if (!$this->eloquentLog->fill($log)->save()) throw new AdminLogicException();

        // ユーザー書き換え
        $data->user_id = $auth['id'];

        // データを保存
        $data->save();

        // レスポンスモデルを作成して返す
        return $this->responseRepo->makeModel(true, '', $message);
    }

    public function remove(int $id, array $auth): LogicResponse
    {
        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($id, $auth) {
                // データ取得
                $data = $this->eloquentSpot->where('id', $id)->first();

                // 削除するデータを取得して削除し、結果を返す
                if (!$data->delete()) throw new AdminLogicException();

                // ログの保存
                $log = LogHelper::makeLogData($data->toArray(), 'admin', 'spot', 'remove', $data->id, $data->name . 'を削除しました', $auth);
                if (!$this->eloquentLog->fill($log)->save()) throw new AdminLogicException();

                // レスポンスモデルを作成して返す
                return $this->responseRepo->makeModel(true, '', $data->name . 'を削除しました');
            });
        } catch (AdminLogicException $e) {
            // レスポンスモデルを作成して返す
            return $this->responseRepo->makeModel(false, '', '削除できませんでした');
        }
    }

    public function count(): int
    {
        return $this->eloquentSpot->count();
    }

    /**
     * キーワードに一致して
     * かつ指定したuser_idで登録されていなく、
     * かつ指定したspot_idでも登録されていないspot_idを取得
     */
    public function keyword_selected(array $request): array
    {
        // 初期化
        $selected = [];

        // リクエストの処理
        if (empty($request['keyword'])) return [];
        if (!empty($request['selected'])) {
            $selected = explode('|', $request['selected']);
            $selected = array_map('intval', $selected); // intに変換
        };

        $data = $this->eloquentSpot::query()
            ->where('search_words', 'LIKE', '%' . $request['keyword'] . '%')
            ->whereNotIn('id', $selected)
            ->select('id', 'name')
            ->get();

        // データが無ければ空配列を返す
        if ($data->count() <= 0) return [];

        // 配列の重複削除をして返す
        return $data->toArray();
    }

    public function download()
    {
        // ページネートオブジェクトを作成
        $query = $this->eloquentSpot::query();

        // 並び
        $query->orderBy('id', 'DESC');

        // リレーション
        $query->with('category', 'city', 'prefecture', 'spot_detail');

        $spots = $query->get()->toArray();

        $results = [];

        foreach($spots as $spot) {
            $result['id'] = $spot['id'];
            $result['display'] = $spot['display'];
            $result['name'] = $spot['name'];
            $result['email'] = $spot['spot_detail']['email'];
            $result['zip'] = $spot['zip1'] . '-' . $spot['zip2'];
            $result['address'] = $spot['prefecture']['name'] . $spot['city']['name'] . $spot['address'];
            $result['tel'] = $spot['tel1'] . '-' . $spot['tel2'] . '-' . $spot['tel3'];
            $result['fax'] = $spot['spot_detail']['fax'];
            $result['staff'] = $spot['spot_detail']['staff'];
            $result['company_name'] = $spot['spot_detail']['company_name'];
            $result['company_staff'] = $spot['spot_detail']['company_staff'];
            $result['comment'] = $spot['spot_detail']['comment'];
            $result['comment2'] = $spot['spot_detail']['comment2'];
            $result['category'] = $spot['category']['name'];
            $results[] = $result;
        }

        return $results;
    }
}
