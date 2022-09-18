<?php

namespace Tool\General\Application\Controllers\Auth;

use App\Http\Controllers\Controller;
use Tool\General\Application\Requests\ResetPassword\ResetPasswordRequest;
use Tool\General\Domain\Models\User\UserRepository;
use Tool\General\Domain\Models\ResetPassword\ResetPasswordRepository;

class ResetPasswordController extends Controller
{
    private ResetPasswordRepository $resetPasswordRepo;
    private UserRepository $userRepo;

    public function __construct(
        ResetPasswordRepository $resetPasswordRepo,
        UserRepository $userRepo
    )
    {
        $this->resetPasswordRepo = $resetPasswordRepo;
        $this->userRepo = $userRepo;
        $this->middleware('guest');
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function showResetForm(string $token)
    {
        // トークンを元にUserデータを取得
        $user = $this->resetPasswordRepo->getUser(base64_decode($token));

        // データが無ければトップへ飛ばす
        if(count($user) <= 0 ) return redirect('/');

        // ビューに変数セットして表示
        return view('general::auth.reset_password.index', compact('user', 'token'));
    }

    public function reset(ResetPasswordRequest $request)
    {
        // パスワードを変更
        $response = $this->userRepo->changePassword($request->all());

        return redirect('/password/reset_comp')->with(['result' => true, 'title' => $response->getTitle(), 'message' => $response->getMessage()]);
    }

    public function comp()
    {
        // 送信後じゃなければ、トップに戻す
        if (empty(session('title'))) return redirect('/');

        return view('general::auth.reset_password.comp');
    }
}
