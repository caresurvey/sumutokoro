<?php

namespace Tool\General\Application\Controllers;

use App\Http\Controllers\Controller;

class QaController extends Controller
{
    public function index()
    {
        // ビューに変数セットして表示
        return view('general::qa.index.contents');
    }

    public function detail()
    {
        // ビューに変数セットして表示
        return view('general::qa.detail.contents');
    }
}
