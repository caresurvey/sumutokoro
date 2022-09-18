<?php

namespace Tool\General\Application\Controllers;

use App\Http\Controllers\Controller;

class ContentsController extends Controller
{
    public function service()
    {
        // ビューに変数セットして表示
        return view('general::contents.service.contents');
    }

    public function company()
    {
        // ビューに変数セットして表示
        return view('general::contents.company.contents');
    }

    public function sitemap()
    {
        // ビューに変数セットして表示
        return view('general::contents.sitemap.contents');
    }

    public function privacy()
    {
        // ビューに変数セットして表示
        return view('general::contents.privacy.contents');
    }
}
