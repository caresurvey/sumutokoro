<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ClearApcuCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:apcu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'APCuのキャッシュをクリアします';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // キャッシュクリア
        Cache::flush();

        dump('すべてのAPCuキャッシュをクリアしました');

        return Command::SUCCESS;
    }
}
