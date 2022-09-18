<?php

namespace Tool\General\Application\Controllers;

use App\Http\Controllers\Controller;
use Tool\General\Application\UseCases\Home\IndexUseCase;

class HomeController extends Controller
{
    public function index(IndexUseCase $useCase)
    {
        $data = $useCase();

        return view('general::home.index.contents', compact('data'));
    }
}
