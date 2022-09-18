<?php

namespace Tool\General\Application\Controllers\Auth;

use App\Http\Controllers\Controller;
use Tool\General\Application\UseCases\Register\IndexUseCase;
use Tool\General\Application\UseCases\Register\StoreUseCase;

class RegisterController extends Controller
{
    public function index(IndexUseCase $useCase)
    {
        // データを取得
        $data = $useCase();

        // ビューに変数セットして表示
        return view('general::auth.register.index.contents', compact('data'));
    }

    public function store(StoreUseCase $useCase)
    {
        // データ更新
        $response = $useCase();

        // 入力画面へ戻る
        return redirect('/register/comp')->with(['result' => true, 'title' => $response->getTitle(), 'message' => $response->getMessage()]);
    }

    public function comp()
    {
        // 送信後じゃなければ、トップに戻す
        if (empty(session('title'))) return redirect('/');

        // ビューに変数セットして表示
        return view('general::auth.register.comp.contents');
    }
}
