<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpot;

class DataSpotZipCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:spot_zip';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '事業所のZIP自動設定';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $eloquentSpot = new EloquentSpot();
        $spots = $eloquentSpot
            ->where('zip1', '<>', '')
            ->where('zip2', '<>', '')
            ->pluck('id');

        //$eloquentSpot->whereIn('id', $spots)->update(['for_check_movein' => 1]);

        var_dump($spots);

        dump('変更済み');
        return Command::SUCCESS;
    }
}
