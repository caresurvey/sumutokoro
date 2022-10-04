<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TestJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $param;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->param = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // テキストファイル作成
        file_put_contents(storage_path('texts/text.txt'), 'fdsafds');
    }

    public function queuesNone()
    {
        $start = time();

        $file = $this->fp->makeTextFile();

        $this->fp->write($file, self::MAX);

        return view('sample_queues', ['start' => $start]);
    }

    const MAX = 3000; // ループ回数

    private $fp;

    public function queuesDatabase()
    {
        $start = time();

        $file = $this->fp->makeTextFile();

        GenerateTextFile::dispatch($file, self::MAX);

        return view('sample_queues', ['start' => $start]);
    }
}
