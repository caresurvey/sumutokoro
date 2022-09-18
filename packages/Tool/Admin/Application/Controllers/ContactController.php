<?php

namespace Tool\Admin\Application\Controllers;

use App\Http\Controllers\Controller;
use Tool\Admin\Application\UseCases\Contact\IndexUseCase;
use Tool\Admin\Application\UseCases\Contact\ShowUseCase;

class ContactController extends Controller
{
    public function index(IndexUseCase $useCase)
    {
        $data = $useCase();

        // ビューに変数セットして表示
        return view('admin::contact.index.contents', compact('data'));
    }

    public function show(int $id, ShowUseCase $useCase)
    {
        $data = $useCase($id);

        // ビューに変数セットして表示
        return view('admin::contact.show.contents', compact('data'));
    }
}
