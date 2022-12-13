<?php

namespace Tool\General\Application\Controllers;

use App\Http\Controllers\Controller;
use Tool\General\Application\UseCases\Contact\SendUseCase;

class ContactController extends Controller
{
    public function index()
    {
        // ビューに変数セットして表示
        return view('general::contact.index.contents');
    }

    public function send(SendUseCase $useCase)
    {        
        // データを新規保存後、メールを送信
        $response = $useCase();

        // 完了画面へ移動
        return redirect('/contact/comp/')->with(['result' => true, 'title' => $response->getTitle(), 'message' => $response->getMessage()]);
    }

    public function comp()
    {
        // 送信後じゃなければ、トップに戻す
        if (empty(session('title'))) return redirect('/');

        // ビューに変数セットして表示
        return view('general::contact.comp.contents');
    }
}
