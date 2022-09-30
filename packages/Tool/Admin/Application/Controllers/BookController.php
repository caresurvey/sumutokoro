<?php

namespace Tool\Admin\Application\Controllers;

use App\Http\Controllers\Controller;
use Tool\Admin\Application\UseCases\Book\InputUseCase;
use Tool\Admin\Application\UseCases\Book\PreviewUseCase;
use Tool\Admin\Application\UseCases\Book\PublishUseCase;

class BookController extends Controller
{
    /**
     * 確認用の誌面プレビュー
     * @param int $id
     * @param string $token
     * @param PreviewUseCase $useCase
     * @return string
     */
    public function preview(int $id, string $token, PreviewUseCase $useCase)
    {
        // データを取得し、表示
        return $useCase($id, $token);
    }

    public function input(InputUseCase $useCase)
    {
        // データを取得
        $data = $useCase();

        // ビューに変数セットして表示
        return view('admin::book.input.contents', compact('data'));
    }

    public function publish(PublishUseCase $useCase)
    {
        // データを取得し、出力
        $result = $useCase();

        dd($result);
    }
}

