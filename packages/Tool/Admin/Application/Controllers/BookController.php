<?php

namespace Tool\Admin\Application\Controllers;

use App\Http\Components\FileOperation;
use App\Jobs\GenerateTextFile;
use App\Jobs\TestJobs;
use App\Http\Controllers\Controller;
use Tool\Admin\Application\UseCases\Book\InputUseCase;
use Tool\Admin\Application\UseCases\Book\PreviewUseCase;
use Tool\Admin\Application\UseCases\Book\PublishUseCase;

class BookController extends Controller
{
    const MAX = 3000; // ループ回数

    private $fp;

    public function __construct()
    {
        $this->fp = new FileOperation();
    }

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

    public function form(InputUseCase $useCase)
    {
        // データを取得
        $data = $useCase();

        // ビューに変数セットして表示
        return view('admin::book.input.contents', compact('data'));
    }

    public function publish(PublishUseCase $useCase)
    {
        // データを取得し、出力
        $response = $useCase();

        // 入力画面へ戻る
        return redirect(url()->previous())->with($response->getResponse());
    }

    public function test()
    {
        $text = 'testQueue';

        // ジョブをディスパッチする
        $this->dispatch(new TestJobs($text));

        echo 'queueOK!'; exit;
    }

    public function queuesNone()
    {
        $start = time();

        $file = $this->fp->makeTextFile();

        $this->fp->write($file, self::MAX);

        return view('admin::book.sample_queues', ['start' => $start]);
    }

    public function queuesDatabase()
    {
        echo 'ok'; exit;
        $start = time();

        $file = $this->fp->makeTextFile();

        GenerateTextFile::dispatch($file, self::MAX);

        return view('admin::book.sample_queues', ['start' => $start]);
    }
}

