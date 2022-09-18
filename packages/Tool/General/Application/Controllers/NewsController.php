<?php

namespace Tool\General\Application\Controllers;

use App\Http\Controllers\Controller;

use Tool\General\Application\UseCases\News\IndexUseCase;
use Tool\General\Application\UseCases\News\DetailUseCase;

class NewsController extends Controller
{
    public function index(IndexUseCase $useCase)
    {
        // データを取得
        $data = $useCase();

        // ビューに変数セットして表示
        return view('general::news.index.contents', compact('data'));
    }

    public function detail(int $id, DetailUseCase $useCase)
    {
        // データを取得
        $data = $useCase($id);

        // ビューに変数セットして表示
        return view('general::news.detail.contents', compact('data'));
    }
}
