<?php

namespace Tool\General\Application\Controllers\Auth;

use App\Http\Controllers\Controller;
use Tool\General\Application\UseCases\ForgetPassword\SendUseCase;

class ForgotPasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        // ビューに変数セットして表示
        return view('general::auth.forget_password.index');
    }

    public function postResetLinkEmail(SendUseCase $useCase)
    {
        // データを新規保存後、メールを送信
        $response = $useCase();

        // 完了画面へ移動
        return redirect('password/email_comp')->with(['result' => true, 'title' => $response->getTitle(), 'message' => $response->getMessage()]);
    }

    public function comp()
    {
        // 送信後じゃなければ、トップに戻す
        if (empty(session('title'))) return redirect('/');

        return view('general::auth.forget_password.comp');
    }
}
