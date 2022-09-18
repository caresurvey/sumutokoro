<?php

namespace Tool\General\Application\Controllers\Auth;

use App\Http\Controllers\Controller;
use Tool\General\Application\Requests\ForgotPassword\ForgotPasswordRequest;
use Tool\General\Domain\Models\Delivery\DeliveryRepository;
use Tool\General\Domain\Models\Delivery\Mail\PasswordResetOrderMailer;
use Tool\General\Domain\Models\ResetPassword\ResetPasswordRepository;

class ForgotPasswordController extends Controller
{
    private DeliveryRepository $deliveryRepo;
    private PasswordResetOrderMailer $passwordResetOrderMailer;
    private ResetPasswordRepository $resetPasswordRepo;

    public function __construct(
        DeliveryRepository $deliveryRepo,
        PasswordResetOrderMailer $passwordResetOrderMailer,
        ResetPasswordRepository $resetPasswordRepo
    )
    {
        $this->deliveryRepo = $deliveryRepo;
        $this->passwordResetOrderMailer = $passwordResetOrderMailer;
        $this->resetPasswordRepo = $resetPasswordRepo;
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        // ビューに変数セットして表示
        return view('general::auth.forget_password.index');
    }

    public function postResetLinkEmail(ForgotPasswordRequest $request)
    {
        // トークン発行
        $token = $this->resetPasswordRepo->makeToken($request->getEmail());

        // パスワードを書き込み
        $response = $this->resetPasswordRepo->store($request->getEmail(), $token);

        // メールを送信する（本番環境かステージング環境のみ）
        if (config('app.env') === 'production' || config('app.env') === 'staging') {
            $passwordResetOrderMail = $this->deliveryRepo->createDeliverForPasswordResetOrderMail(['email' => $request->getEmail(), 'token' => base64_encode($token)]);
            $this->passwordResetOrderMailer->to($passwordResetOrderMail, $request->getEmail(), $token);
        }

        return redirect('password/email_comp')->with(['result' => true, 'title' => $response->getTitle(), 'message' => $response->getMessage()]);
    }

    public function comp()
    {
        // 送信後じゃなければ、トップに戻す
        if (empty(session('title'))) return redirect('/');

        return view('general::auth.forget_password.comp');
    }
}
