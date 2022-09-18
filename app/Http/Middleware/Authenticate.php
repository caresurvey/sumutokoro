<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            $URI = explode("/", $request->getRequestUri());
            switch ($URI[1]){
                // 運営管理画面
                case 'admin':
                return route('admin.login');

                // ユーザーマイページ
                case 'user':
                return route('user.login');
            }

            return route('home');
        }
    }
}
