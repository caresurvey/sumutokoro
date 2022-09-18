<?php

namespace Tool\User\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Tool\User\Application\UseCases\Home\IndexUseCase;

class HomeController extends Controller
{
    public function index(IndexUseCase $useCase)
    {
        $data = $useCase(Auth::user()->toArray());

        return view('user::home.index', compact('data'));
    }
}
