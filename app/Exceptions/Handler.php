<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Tool\Admin\Exceptions\AdminLogicException;
use Tool\Admin\Exceptions\AdminNotFoundException;
use Tool\General\Exceptions\GeneralLogicException;
use Tool\General\Exceptions\GeneralNotFoundException;
use Tool\User\Exceptions\UserLogicException;
use Tool\User\Exceptions\UserNotFoundException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (AdminNotFoundException $e, $request) {
            return response()->view('admin::errors.not_found', [], 404);
        });

        $this->renderable(function (AdminLogicException $e, $request) {
            return response()->view('admin::errors.not_found', [], 500);
        });

        $this->renderable(function (GeneralNotFoundException $e, $request) {
            return response()->view('general::errors.not_found', [], 404);
        });

        $this->renderable(function (GeneralLogicException $e, $request) {
            return response()->view('general::errors.not_found', [], 500);
        });

        $this->renderable(function (UserNotFoundException $e, $request) {
            return response()->view('user::errors.not_found', [], 404);
        });

        $this->renderable(function (UserLogicException $e, $request) {
            return response()->view('user::errors.not_found', [], 500);
        });
    }
}
