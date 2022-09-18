<?php

namespace Tool\User\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Tool\User\Application\UseCases\User\EditUseCase;
use Tool\User\Application\UseCases\User\UpdateUseCase;

class UserController extends Controller
{
    public function profile(EditUseCase $useCase)
    {
        // データを取得
        $data = $useCase(Auth::user()->toArray());

        // ビューに変数セットして表示
        return view('user::user.edit.contents', compact('data'));
    }
    
    public function update(int $id, UpdateUseCase $useCase)
    {
        // データ更新
        $response = $useCase(Auth::user()->toArray());

        // 入力画面へ戻る
        return redirect(url()->previous())->with($response->getResponse());
    }
}
