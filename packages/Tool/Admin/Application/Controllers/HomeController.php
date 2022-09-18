<?php

namespace Tool\Admin\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Tool\Admin\Application\UseCases\Home\IndexUseCase;

class HomeController extends Controller
{
    public function index(IndexUseCase $useCase)
    {
        $data = $useCase(Auth::user()->toArray());

        return view('admin::home.index', compact('data'));
    }
}
