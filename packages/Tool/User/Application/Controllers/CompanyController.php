<?php

namespace Tool\User\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Tool\User\Application\UseCases\Company\DisplayUseCase;
use Tool\User\Application\UseCases\Company\IndexUseCase;
use Tool\User\Application\UseCases\Company\EditUseCase;
use Tool\User\Application\UseCases\Company\UpdateUseCase;

class CompanyController extends Controller
{
    public function index(IndexUseCase $useCase)
    {
        // データを取得
        $data = $useCase(Auth::user()->toArray());

        // ビューに変数セットして表示
        return view('user::company.index.contents', compact('data'));
    }

    public function edit(int $id, EditUseCase $useCase)
    {
        // データを取得
        $data = $useCase($id, Auth::user()->toArray());

        // ビューに変数セットして表示
        return view('user::company.edit.contents', compact('data'));
    }

    public function update(int $id, UpdateUseCase $useCase)
    {
        // データ更新
        $response = $useCase(Auth::user()->toArray());

        // 入力画面へ戻る
        return redirect(url()->previous())->with($response->getResponse());
    }

    public function display(int $id, DisplayUseCase $useCase)
    {
        // 表示変更
        $response = $useCase($id, Auth::user()->toArray());

        // 元のページへ戻る
        return redirect(url()->previous())->with($response->getResponse());
    }
}
