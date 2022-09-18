<?php

namespace Tool\Admin\Application\Controllers;

use App\Http\Controllers\Controller;
use Tool\Admin\Application\Requests\Fax\PrintRequest;

class FaxController extends Controller
{
    public function index()
    {
        // ビューに変数セットして表示
        return view('admin::fax.index.contents');
    }

    public function print(PrintRequest $request)
    {
        // データを取得
        $data = $request->all();

        // ビューに変数セットして表示
        return view('admin::fax.print.contents', compact('data'));
    }
}
