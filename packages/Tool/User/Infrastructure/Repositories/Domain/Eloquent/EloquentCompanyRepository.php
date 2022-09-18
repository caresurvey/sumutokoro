<?php

namespace Tool\User\Infrastructure\Repositories\Domain\Eloquent;

use Tool\User\Domain\Models\Common\LogicResponse;
use Tool\User\Domain\Models\Company\CompanyRepository;
use Tool\User\Exceptions\UserLogicException;
use Tool\User\Exceptions\UserNotFoundException;
use Tool\User\Infrastructure\Eloquents\EloquentCompany;
use Tool\User\Infrastructure\Eloquents\EloquentCompanyUser;
use Tool\User\Infrastructure\Repositories\Domain\Logic\LogicResponseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Tool\Common\Helpers\LogHelper;
use Tool\Common\Infrastructure\Eloquents\EloquentLog;
use DB;

class EloquentCompanyRepository implements CompanyRepository
{
    private EloquentCompany $eloquentCompany;
    private EloquentCompanyUser $eloquentCompanyUser;
    private EloquentLog $eloquentLog;
    private LogicResponseRepository $responseRepo;
    private int $limit = 30;

    public function __construct(
        EloquentCompany         $eloquentCompany,
        EloquentCompanyUser     $eloquentCompanyUser,
        EloquentLog                     $eloquentLog,
        LogicResponseRepository $responseRepo
    )
    {
        $this->eloquentCompany = $eloquentCompany;
        $this->eloquentCompanyUser = $eloquentCompanyUser;
        $this->eloquentLog = $eloquentLog;
        $this->responseRepo = $responseRepo;
    }

    public function list(array $auth): array
    {
        // 認証してなければデータを読み込まない
        if($auth['is_authenticated'] === 0) return ['totalCount' => 0];

        // Userに関連したSpotIdだけを取得する
        $companyIds = $this->eloquentCompanyUser->where('user_id', $auth['id'])->pluck('company_id');

        // ページネートオブジェクトを作成
        $query = $this->eloquentCompany::query();

        // ソート機能追加
        $query->sortable();

        // 検索条件
        $query->whereIn('id', $companyIds);

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
        $data = new LengthAwarePaginator($list, $totalCount, $this->limit, $current, array('path' => config('myapp.app_path') . '/' . config('myapp.app_admin_prefix') . '/company/'));

        // データを返す
        return [
            'companies' => $data->items(),
            'current' => $current,
            'totalCount' => $totalCount,
            'limit' => $this->limit,
            'fullPage' => (int)ceil($totalCount / $this->limit),
            'linkTag' => $data->links('vendor.pagination.default')->toHtml()
        ];
    }

    public function edit(int $id, array $auth): array
    {
        // Userに関連したCompanyIdだけを取得し、データがなければエラーを返す
        if($this->eloquentCompanyUser->where('company_id', $id)->where('user_id', $auth['id'])->count() <= 0) throw new UserNotFoundException();

        // 必要データの取得
        $data = $this->eloquentCompany
            ->where('id', $id)
            ->with('user')
            ->first();

        // データがない場合
        if (empty($data)) throw new UserNotFoundException();

        // データがあれば返す
        return $data->toArray();
    }

    public function update(array $request, array $auth): LogicResponse
    {
        // Userに関連したSpotIdだけを取得し、データがあるかどうかチェック。なければ処理を中断してエラーを返す
        if($this->eloquentCompanyUser->where('company_id', $request['company']['id'])->where('user_id', $auth['id'])->count() <= 0) throw new UserNotFoundException();

        // POSTデータを取得
        $post = $request;
        $post['company']['user_id'] = $auth['id'];

        try {
            // 保存（トランザクション）
            return DB::transaction(function () use ($post, $auth) {

                // Companyデータ更新
                $data = $this->eloquentCompany->where('id', $post['company']['id'])->first();

                // Companyを更新し、失敗した場合例外を投げる
                if (!$data->fill($post['company'])->save()) throw new UserLogicException();

                // ログの保存
                $log = LogHelper::makeLogData($post, 'user', 'company', 'update', $data->id, $data->name . 'を変更しました', $auth);
                if (!$this->eloquentLog->fill($log)->save()) throw new UserLogicException();

                // レスポンスモデルを作成して返す
                return $this->responseRepo->makeModel(true, '', $data->name . 'を変更しました');
            });
        } catch (UserLogicException $e) {
            // レスポンスモデルを作成して返す
            return $this->responseRepo->makeModel(false, '', '変更できませんでした');
        }
    }

    public function display(int $id, array $auth): LogicResponse
    {
        // Userに関連したSpotIdだけを取得し、データがあるかどうかチェック。なければ処理を中断してエラーを返す
        if($this->eloquentCompanyUser->where('company_id', $id)->where('user_id', $auth['id'])->count() <= 0) throw new UserNotFoundException();

        // 変更するデータを取得
        $data = $this->eloquentCompany->where('id', $id)->where('id', $id)->first();

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
        $log = LogHelper::makeLogData($data->toArray(), 'user', 'company', 'display', $data->id, $message, $auth);
        if (!$this->eloquentLog->fill($log)->save()) throw new UserLogicException();

        // レスポンスモデルを作成して返す
        return $this->responseRepo->makeModel(true, '', $message);
    }

    public function count(): int
    {
        return $this->eloquentCompany->count();
    }
}
