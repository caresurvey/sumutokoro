<?php

namespace Tool\Admin\Application\Controllers;

use App\Http\Controllers\Controller;
use Tool\Admin\Application\UseCases\Log\IndexUseCase;
use Tool\Admin\Application\UseCases\Log\ShowUseCase;

class LogController extends Controller
{
    public function index(IndexUseCase $useCase)
    {
        $data = $useCase();

        // ビューに変数セットして表示
        return view('admin::log.index.contents', compact('data'));
    }

    public function show(int $id, ShowUseCase $useCase)
    {
        $data = $useCase($id);

        // ビューに変数セットして表示
        return view('admin::log.show.contents', compact('data'));
    }
}
