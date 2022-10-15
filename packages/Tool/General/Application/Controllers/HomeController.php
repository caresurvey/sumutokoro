<?php

namespace Tool\General\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Tool\General\Application\UseCases\Home\IndexUseCase;
use Tool\General\Infrastructure\Eloquents\EloquentResetPassword;

class HomeController extends Controller
{
    public function index(IndexUseCase $useCase)
    {

        $data = $useCase();

        return view('general::home.index.contents', compact('data'));
    }
}

//http://localhost:11061/password/reset/JDJ5JDEwJDBlaS54MFZNQXZKQ0ZYWDI0SFFDd3VES0lJVGJFaG1RR3BDOEV6cmdhV3A5QlJ1RnE1MFFh
