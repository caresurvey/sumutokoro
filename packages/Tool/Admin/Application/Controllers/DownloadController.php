<?php

namespace Tool\Admin\Application\Controllers;

use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    public function index()
    {
        // ビューに変数セットして表示
        return view('admin::download.index.contents');
    }
}
