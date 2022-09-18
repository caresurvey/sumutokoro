<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // 初期化
        $auth = true;

        #ユーザーがログインしていない場合は、ログイン画面へリダイレクト
        if(empty(auth()->user())) return redirect()->route(config('myapp.app_admin_prefix'). '/login');

        //ユーザーの権限チェック（3より大きければ弾く）
        if (auth()->user()->role_id >= 2) $auth = false;
 
        //ユーザーの権限チェックがtrueだった場合は、アクセスを許可。
        if ($auth === true) return $next($request);

        //それ以外はホームにリダイレクト
        return redirect('/');
    }
}