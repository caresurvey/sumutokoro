<?php

namespace Tool\Admin\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Tool\Common\Domain\Models\Book\Publish\Format\PublishFormat;

class PublishBookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private PublishFormat $publishFormat;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(PublishFormat $publishFormat)
    {
        $this->publishFormat = $publishFormat;
    }

    public function handle()
    {
        // PDFに出力する　
        $this->publishFormat->output();
    }
}