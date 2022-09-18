<?php

namespace Tool\General\Application\Controllers;

use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index()
    {
        // ビューに変数セットして表示
        return view('general::search.index.contents');
    }
}
