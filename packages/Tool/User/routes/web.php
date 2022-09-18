<?php
$namespace = 'Tool\User\Application\Controllers';

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::prefix('user')
    ->name('user.')
    ->namespace($namespace)
    ->middleware('web')
    ->group(function(){

    /**
     * ログイン
     */
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    /**
     * ユーザーページトップ
     */
    Route::get('/', 'HomeController@index')->middleware(['auth:user', 'auth_user']);

    /**
     * ユーザー管理
     */
    Route::resource('user', 'UserController', ['only' => ['update']])->middleware(['auth:user', 'auth_user']);
    Route::get('profile', 'UserController@profile')->middleware(['auth:user', 'auth_user']);

    /**
     * 法人管理
     */
    Route::resource('company', 'CompanyController', ['only' => ['index', 'edit', 'update']])->middleware(['auth:user', 'auth_authenticated_user']);
    Route::get('company/display/{id}', 'CompanyController@display')->middleware(['auth:user', 'auth_authenticated_user']);

    /**
     * 事業所管理
     */
    Route::resource('spot', 'SpotController', ['only' => ['index', 'edit', 'update']])->middleware(['auth:user', 'auth_authenticated_user']);
    Route::get('spot/display/{id}', 'SpotController@display')->middleware(['auth:user', 'auth_authenticated_user']);

    /**
     * パスワード変更
     */
    Route::get('password', 'PasswordController@edit')->middleware(['auth:user', 'auth_user']);
    Route::put('password', 'PasswordController@update')->middleware(['auth:user', 'auth_user']);
    Route::get('password/comp', 'PasswordController@comp')->middleware(['auth:user', 'auth_user']);
});
