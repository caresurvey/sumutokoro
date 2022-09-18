<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class Setcurrent
{
    public function handle(Request $request, Closure $next)
    {
        // action名を取得
        $route = Route::getRoutes()->match($request);
        $actionName = str_replace('@', '', strstr($route->getActionName(), '@'));

        // controller名を取得
        $controllerName = substr($route->getActionName() , strrpos($route->getActionName(), '\\') );
        $controllerName = str_replace('\\' ,'', $controllerName);
        $ignore = strstr($controllerName, 'Controller');
        $controllerName = str_replace($ignore ,'', $controllerName);

        // 現在のURLを取得
        $currentUrl = \Request::url();

        // viewにセット
        View::share(compact('controllerName', 'actionName', 'currentUrl'));

        return $next($request);
    }
}
