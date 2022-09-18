<?php

namespace Tool\General\Application\Controllers;

use App\Http\Controllers\Controller;
use Tool\General\Application\UseCases\Spot\IndexUseCase;
use Tool\General\Application\UseCases\Spot\DetailUseCase;

class SpotController extends Controller
{
    public function index(IndexUseCase $useCase)
    {
        // データを取得
        $data = $useCase();

        // ビューに変数セットして表示
        return view('general::spot.index.contents', compact('data'));
    }

    public function detail(int $id, DetailUseCase $useCase)
    {
        // データを取得
        $data = $useCase($id);

        // ビューに変数セットして表示
        return view('general::spot.detail.contents', compact('data'));
    }

    public function detail_redirect(int $id) {
        return redirect('/spot/' . $id);
    }
}
