<?php
$namespace = 'Tool\Admin\Application\Controllers';

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::prefix('admin')
    ->name('admin.')
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
     * 管理トップ
     */
    Route::get('/', 'HomeController@index')->middleware(['auth:admin', 'auth_admin']);

    /**
     * ログアウト
     */
    Route::get('logout', 'Auth\LoginController@logout')->middleware(['auth:admin', 'auth_admin']);

    /**
     * 法人管理
     */
    Route::resource('company', 'CompanyController', ['only' => ['index', 'edit', 'store', 'update', 'destroy']])->middleware(['auth:admin', 'auth_admin']);
    Route::get('company/display/{id}', 'CompanyController@display')->middleware(['auth:admin', 'auth_admin']);
    Route::get('company/keyword', 'CompanyController@keyword')->middleware(['auth:admin', 'auth_admin']);
    Route::get('company/keyword_selected', 'CompanyController@keyword_selected')->middleware(['auth:admin', 'auth_admin']);

    /**
     * 事業所管理
     */
    Route::resource('spot', 'SpotController', ['only' => ['index', 'edit', 'store', 'update', 'destroy']])->middleware(['auth:admin', 'auth_admin']);
    Route::get('spot/display/{id}', 'SpotController@display')->middleware(['auth:admin', 'auth_admin']);
    Route::get('spot/keyword_selected', 'SpotController@keyword_selected')->middleware(['auth:admin', 'auth_admin']);

    /**
     * お知らせ管理
     */
    Route::resource('news', 'NewsController', ['only' => ['index', 'edit', 'store', 'update', 'destroy']])->middleware(['auth:admin', 'auth_admin']);
    Route::get('news/display/{id}', 'NewsController@display')->middleware(['auth:admin', 'auth_admin']);
    Route::get('news/duplicate/{id}', 'NewsController@duplicate')->middleware(['auth:admin', 'auth_admin']);

    /**
     * FAX管理
     */
    Route::get('fax', 'FaxController@index')->middleware(['auth:admin', 'auth_admin']);
    Route::post('fax', 'FaxController@print')->middleware(['auth:admin', 'auth_admin']);

    /**
     * ダウンロード
     */
    Route::get('download', 'DownloadController@index')->middleware(['auth:admin', 'auth_admin']);

    /**
     * ユーザー管理
     */
    Route::resource('user', 'UserController', ['only' => ['index', 'edit', 'store', 'update', 'destroy']])->middleware(['auth:admin', 'auth_admin']);
    Route::get('user/enabled/{id}', 'UserController@enabled')->middleware(['auth:admin', 'auth_admin']);

    /**
     * お問い合わせ履歴
     */
    Route::get('contact', 'ContactController@index')->middleware(['auth:admin', 'auth_admin']);
    Route::get('contact/{id}', 'ContactController@show')->middleware(['auth:admin', 'auth_admin']);

    /**
     * 操作履歴
     */
    Route::get('log', 'LogController@index')->middleware(['auth:admin', 'auth_admin']);
    Route::get('log/{id}', 'LogController@show')->middleware(['auth:admin', 'auth_admin']);
});
