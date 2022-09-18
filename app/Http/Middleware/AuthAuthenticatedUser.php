<?php

namespace App\Http\Middleware;

use Closure;

class AuthAuthenticatedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 初期化
        $auth = true;

        #ユーザーがログインしていない場合は、ログイン画面へリダイレクト
        if(empty(auth()->user())) return redirect()->route('/user/login');
 
        //ユーザーの権限チェック
        if (auth()->user()->role_id !== 3) $auth = false;
 
         //ユーザーの認証チェック
        if (auth()->user()->is_authenticated === 0) $auth = false;

        //ユーザーの権限チェックがtrueだった場合は、アクセスを許可。
        if ($auth === true) return $next($request);

        //それ以外はホームにリダイレクト
        return redirect('/');
    }
}