<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpot;

class DataMonthlyPriceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:monthly_price';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '月額料金レンジの間にある「〜」を自動判定する';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $eloquentSpot = new EloquentSpot();
        $spots = $eloquentSpot
            ->where('monthly_price_max', '<>', 0)
            ->where('for_check_monthly', 0)
            ->pluck('id');

        $eloquentSpot->whereIn('id', $spots)->update(['for_check_monthly' => 1]);

        dump('変更済み');
        return Command::SUCCESS;
    }
}
