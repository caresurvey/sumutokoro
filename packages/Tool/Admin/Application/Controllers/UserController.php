<?php

namespace Tool\Admin\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Tool\Admin\Application\UseCases\User\DeleteUseCase;
use Tool\Admin\Application\UseCases\User\EnabledUseCase;
use Tool\Admin\Application\UseCases\User\IndexUseCase;
use Tool\Admin\Application\UseCases\User\EditUseCase;
use Tool\Admin\Application\UseCases\User\StoreUseCase;
use Tool\Admin\Application\UseCases\User\UpdateUseCase;

class UserController extends Controller
{
    public function index(IndexUseCase $useCase)
    {
        // データを取得
        $data = $useCase(Auth::user()->toArray());

        // ビューに変数セットして表示
        return view('admin::user.index.contents', compact('data'));
    }

    public function store(StoreUseCase $useCase)
    {
        // データを新規保存後、保存したidを取得
        $response = $useCase(Auth::user()->toArray());

        // 保存したデータの編集画面へ移動
        return redirect('/' . config('myapp.app_admin_prefix') . '/user/' . $response->getData()['id'] . '/edit/')->with(['result' => $response->getResult(), 'message' => $response->getMessage()]);
    }

    public function edit(int $id, EditUseCase $useCase)
    {
        // データを取得
        $data = $useCase($id, Auth::user()->toArray());

        // ビューに変数セットして表示
        return view('admin::user.edit.contents', compact('data'));
    }

    public function update(int $id, UpdateUseCase $useCase)
    {
        // データ更新
        $response = $useCase(Auth::user()->toArray());

        // 入力画面へ戻る
        return redirect(url()->previous())->with($response->getResponse());
    }

    public function destroy(int $id, DeleteUseCase $useCase)
    {
        // データ更新
        $response = $useCase($id, Auth::user()->toArray());

        // 一覧画面へ移動
        return redirect('/' . config('myapp.app_admin_prefix') . '/user')->with($response->getResponse());
    }

    public function enabled(int $id, EnabledUseCase $useCase)
    {
        // 表示変更
        $response = $useCase($id, Auth::user()->toArray());

        // 元のページへ戻る
        return redirect(url()->previous())->with($response->getResponse());
    }
}
