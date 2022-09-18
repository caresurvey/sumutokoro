<?php

namespace Tool\Admin\Application\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Tool\Common\Helpers\LogHelper;
use Tool\Common\Infrastructure\Eloquents\EloquentLog;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating admins for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * Where to redirect admins after login.
     *
     * @var string
     */
    //protected $redirectTo = config('myapp.app_admin_prefix');

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:user')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin::auth.login');
    }

    public function logout(Request $request)
    {
        // ログのデータ作成
        $data = [
            'id' => Auth::guard('admin')->user()['id'],
            'name' => Auth::guard('admin')->user()['name'],
        ];

        // ログの保存
        $log = LogHelper::makeLogDataForAuthenticate($data, 'admin', 'user', 'logout', $data['id'], $data['name'].'さんがログアウトしました');
        $eloquentLog = new EloquentLog();
        $eloquentLog->fill($log)->save();

        // 本来のログアウト処理をする
        $this->performLogout($request);

        // リダイレクト
        return redirect(config('myapp.app_admin_prefix') . '/login');
    }

    /**
     * ユーザーを探す条件を指定する
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request): array
    {
        return array_merge(
            $request->only($this->username(), 'password'), // 標準の条件
            [ 'role_id' => [1,2] ] // 追加条件
        );
    }

    /**
     * ログイン成功後の遷移先
     */
    public function redirectPath()
    {
        return config('myapp.app_admin_prefix');
    }

    /**
     * ログイン成功後のメソッド
     * @param Request $request
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        // データ作成
        $data = [
            'id' => $user['id'],
            'name' => $user['name'],
        ];

        // ログの保存
        $log = LogHelper::makeLogDataForAuthenticate($data, 'admin', 'user', 'login', $data['id'], $data['name'].'さんがログインしました');
        $eloquentLog = new EloquentLog();
        $eloquentLog->fill($log)->save();

        // ログイン後のリダイレクト
        return redirect()->intended($this->redirectPath());
    }
}
