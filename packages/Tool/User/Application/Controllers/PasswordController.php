<?php

namespace Tool\User\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Tool\User\Application\UseCases\Password\EditUseCase;
use Tool\User\Application\UseCases\Password\UpdateUseCase;

class PasswordController extends Controller
{
    public function edit(EditUseCase $useCase)
    {
        // データを取得
        $data = $useCase(Auth::user()->toArray());

        // ビューに変数セットして表示
        return view('user::password.edit.contents', compact('data'));
    }

    public function update(UpdateUseCase $useCase)
    {
        // データ更新
        $response = $useCase(Auth::user()->toArray());

        // 入力画面へ戻る
        return redirect('/user/profile')->with($response->getResponse());
    }
}
