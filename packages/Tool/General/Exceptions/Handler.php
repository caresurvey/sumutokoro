<?php

namespace Tool\General\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Route;
use Request;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
      'password',
      'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    protected function authenticated(\Illuminate\Http\Request $request, $user)
    {
        // ここに追加したい処理を書く
        // 今回は例としてログインの履歴をDBに書き込み
        $model = Model::create([
          'login_id'  => $user->email,
          'name'      => $user->name,
          'client_ip' => \Request::ip(),
          'login_at'  => \DB::raw('now()')
        ]);
        echo 'ok'; exit;

        // ログイン後のリダイレクト
        return redirect()->intended($this->redirectPath());
    }

    //オーバーライド
    //public function authenticated($request, AuthenticationException $exception)
    //{

        /*
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        if (in_array('admin', $exception->guards())) {
            return redirect()->admin('/admin');
        }

        if (in_array('user', $exception->guards())) {
            return redirect()->guest('/user');
        }

        return redirect()->guest(route('/user'));
        */

        //echo 'logined'; exit;

    //}


    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // パッケージ指定初期化
        $package = 'general';

        // メッセージ初期化
        $message = '申し訳ありません、エラーがありました。内容をご確認下さい。';

        // Admin指定
        if (0 === strpos(Request::path(), 'admin/')) $package = 'admin';

        // エラーがあった場合
        if ($this->isHttpException($exception)) {
            // エラー画面表示
            return response()->view($package . "::errors.common", ['exception' => $exception, 'message' => $message]);
        }

        // エラー
        if ($exception instanceof Exception) {
            // 外部キー制約エラー（管理画面）
            if ($package === 'admin' && strpos($exception->getMessage(), 'Cannot delete or update a parent row: a foreign key constraint fails') !== false) {
                $message = '申し訳ありません、、削除できませんでした。記事に使われているデータのようですので、データを確認してください。';

                // エラー画面表示
                return response()->view($package . "::errors.common", ['exception' => $exception, 'message' => $message]);
            }
        }

        // 通常エラー画面
        return parent::render($request, $exception);
    }

    protected function renderHttpException(HttpException $e)
    {
        // パッケージ指定初期化
        $package = 'general';

        // メッセージ初期化
        $message = '申し訳ありません、エラーがありました。内容をご確認下さい。';

        // Admin指定
        if (0 === strpos(Request::path(), 'admin/')) $package = 'admin';

        $status = $e->getStatusCode();
        return response()->view($package . "::errors.common", ['exception' => $e, 'message' => $message], $status);
    }
}
