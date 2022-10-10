<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Eloquent;

use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\Company\CompanyRepository;
use Tool\Admin\Domain\Models\Company\CompanySearch;
use Tool\Admin\Domain\Models\Company\Export;
use Tool\Admin\Exceptions\AdminNotFoundException;
use Tool\Admin\Exceptions\AdminLogicException;
use Tool\Admin\Infrastructure\Eloquents\EloquentCompany;
use Tool\Admin\Infrastructure\Repositories\Domain\Logic\LogicResponseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Tool\Common\Helpers\LogHelper;
use Tool\Common\Infrastructure\Eloquents\EloquentLog;
use DB;

class EloquentCompanyRepository implements CompanyRepository
{
    private EloquentCompany $eloquentCompany;
    private EloquentLog $eloquentLog;
    private LogicResponseRepository $responseRepo;
    private int $limit = 30;

    public function __construct(
        EloquentCompany         $eloquentCompany,
        EloquentLog             $eloquentLog,
        LogicResponseRepository $responseRepo
    )
    {
        $this->eloquentCompany = $eloquentCompany;
        $this->eloquentLog = $eloquentLog;
        $this->responseRepo = $responseRepo;
    }

    public function list(CompanySearch $search, array $auth): array
    {
        // ページネートオブジェクトを作成
        $query = $this->eloquentCompany::query();

        // ソート機能追加
        $query->sortable();

        // 条件検索ページ以外からの検索の場合の処理
        if ($search->isSimple()) {
            if ($search->existsCity()) $query->orWhere('city_id', $search->getCity());
            if ($search->existsCategory()) $query->orWhere('category_id', $search->getCategory());
            if ($search->existsKeyword()) $query->where('name', 'like', '%' . $search->getKeyword() . '%');
        }

        // ベースの並び
        $query->orderBy('created_at', 'DESC');
        $query->orderBy('id', 'DESC');

        // リレーション
        $query->with('user');

        // 現在のページを取得
        $current = Paginator::resolveCurrentPage();

        // 取得開始の件数を割り出す
        $skip = ($this->limit * $current) - $this->limit;

        // 検索結果の件数を取得
        $totalCount = $query->count();

        // 1ページ分のデータを取得
        $list = $query->skip($skip)->take($this->limit)->get();

        // ページネートを生成
        $data = new LengthAwarePaginator($list, $totalCount, $this->limit, $current, array('path' => config('myapp.app_path') . '/' . config('myapp.app_admin_prefix') . '/company/?' . $search->getQuery()));

        // データを返す
        return [
            'companies' => $data->items(),
            'current' => $current,
            'totalCount' => $totalCount,
            'fullPage' => (int)ceil($totalCount / $this->limit),
            'limit' => $this->limit,
            'linkTag' => $data->onEachSide(1)->links('vendor.pagination.default')->toHtml()
        ];
    }

    public function store(array $request, array $auth): LogicResponse
    {
        // POSTデータを取得
        $post = $request;
        $post['company']['user_id'] = $auth['id'];

        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($post, $auth) {

                // Companyデータ更新
                $company = new EloquentCompany();

                // Companyを更新し、失敗した場合例外を投げる
                if (!$company->fill($post['company'])->save()) throw new AdminLogicException();

                // ログの保存
                $log = LogHelper::makeLogData($post, 'admin', 'company', 'store', $company->id, $company->name . 'を登録しました', $auth);
                if (!$this->eloquentLog->fill($log)->save()) throw new AdminLogicException();

                // レスポンスモデルを作成して返す
                return $this->responseRepo->makeModel(true, '', $company->name . 'を登録しました。さらに詳しい情報を入力しましょう。', ['id' => $company->id, 'name' => $company->name, 'backlink' => 'company/' . $company->id . '/edit/']);
            });
        } catch (AdminLogicException $e) {
            // レスポンスモデルを作成して返す
            return $this->responseRepo->makeModel(false, '', '登録できませんでした', ['backlink' => 'company']);
        }
    }

    public function edit(int $id, array $auth): array
    {
        // 必要データの取得
        $data = $this->eloquentCompany
            ->where('id', $id)
            ->with(
                'user'
            )
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
        $post['company']['user_id'] = $auth['id'];

        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($post, $auth) {

                // Companyデータ更新
                $data = $this->eloquentCompany->where('id', $post['company']['id'])->first();

                // Companyを更新し、失敗した場合例外を投げる
                if (!$data->fill($post['company'])->save()) throw new AdminLogicException();

                // ログの保存
                $log = LogHelper::makeLogData($post, 'admin', 'company', 'update', $data->id, $data->name . 'を変更しました', $auth);
                if (!$this->eloquentLog->fill($log)->save()) throw new AdminLogicException();

                // レスポンスモデルを作成して返す
                return $this->responseRepo->makeModel(true, '', $data->name . 'を変更しました');
            });
        } catch (AdminLogicException $e) {
            // レスポンスモデルを作成して返す
            return $this->responseRepo->makeModel(false, '', '変更できませんでした');
        }
    }

    public function display(int $id, array $auth): LogicResponse
    {
        // 削除するデータを取得
        $data = $this->eloquentCompany->where('id', $id)->first();

        // 切り替え
        if ($data->display === 0) {
            $data->display = 1;
            $message = $data->name . 'を表示にしました';
        } else {
            $data->display = 0;
            $message = $data->name . 'を非表示にしました';
        }

        // ログの保存
        $log = LogHelper::makeLogData($data->toArray(), 'admin', 'company', 'display', $data->id, $message, $auth);
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
                $data = $this->eloquentCompany->where('id', $id)->first();

                // 削除するデータを取得して削除し、結果を返す
                if (!$data->delete()) throw new AdminLogicException();

                // ログの保存
                $log = LogHelper::makeLogData($data->toArray(), 'admin', 'company', 'remove', $data->id, $data->name . 'を削除しました', $auth);
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
        return $this->eloquentCompany->count();
    }

    /**
     * キーワードに一致したcompanyを取得
     */
    public function keyword(array $request): array
    {
        // リクエストの処理
        if (empty($request['keyword'])) return [];

        $data = $this->eloquentCompany::query()
            ->where('search_words', 'LIKE', '%' . $request['keyword'] . '%')
            ->select('id', 'name')
            ->get();

        // データが無ければ空配列を返す
        if ($data->count() <= 0) return [];

        // 配列の重複削除をして返す
        return $data->toArray();
    }

    /**
     * キーワードに一致して
     * かつ指定したcompany_idでも登録されていないcompany_idを取得
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

        $data = $this->eloquentCompany::query()
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
        $query = $this->eloquentCompany::query();

        // 並び
        $query->orderBy('id', 'DESC');

        // リレーション
        $query->with('city', 'prefecture');

        $companies = $query->get()->toArray();

        $results = [];
        foreach($companies as $company) {
            $result['id'] = $company['id'];
            $result['display'] = $company['display'];
            $result['name'] = $company['name'];
            $result['email'] = $company['email'];
            $result['zip'] = $company['zip1'] . '-' . $company['zip2'];
            $result['address'] = $company['prefecture']['name'] . $company['city']['name'] . $company['address'];
            $result['tel'] = $company['tel1'] . '-' . $company['tel2'] . '-' . $company['tel3'];
            $result['fax'] = $company['fax'];
            $result['msg'] = $company['msg'];
            $result['start'] = $company['start'];
            $result['president'] = $company['president'];
            $result['staff'] = $company['staff'];
            $results[] = $result;
        }

        return $results;
    }

    public function export(): Export
    {
        $data = $this->eloquentCompany
            ->where('display', 1)
            ->with('prefecture', 'city')
            ->orderBy('city_id', 'asc')
            ->get();
        return new Export($data);
    }
}
