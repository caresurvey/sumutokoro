<?php
$namespace = 'Tool\General\Application\Controllers';

use Illuminate\Support\Facades\Route;

Route::namespace($namespace)
    ->prefix('')
    ->middleware('web')
    ->group(function () {

        Route::get('/', 'HomeController@index');
        Route::get('/search', 'SearchController@index');
        Route::get('/spot', 'SpotController@index');
        Route::get('/spot/{id}', 'SpotController@detail');
        Route::get('/spot/detail/{id}', 'SpotController@detail_redirect');
        Route::get('/service', 'ContentsController@service');
        Route::get('/company', 'ContentsController@company');
        Route::get('/privacy', 'ContentsController@privacy');
        Route::get('/sitemap', 'ContentsController@sitemap');
        Route::get('/news', 'NewsController@index');
        Route::get('/news/{id}', 'NewsController@detail');
        Route::get('/qa', 'QaController@index');
        Route::get('/qa/{id}', 'QaController@detail');

        Route::get('/contact', 'ContactController@index');
        Route::post('/contact', 'ContactController@send');
        Route::get('/contact/comp', 'ContactController@comp');

        /**
         * ユーザー登録
         */
        Route::resource('register', 'Auth\RegisterController', ['only' => ['index', 'store']]);
        Route::get('/register/comp', 'Auth\RegisterController@comp');

        /**
         * パスワードリセット申請
         */
        Route::get('/password/email', 'Auth\ForgotPasswordController@showLinkRequestForm');
        Route::post('/password/email', 'Auth\ForgotPasswordController@postResetLinkEmail');
        Route::get('/password/email_comp', 'Auth\ForgotPasswordController@comp');

        /**
         * パスワードリセット
         */
        Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
        Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
        Route::get('/password/reset_comp', 'Auth\ResetPasswordController@comp');
    });
