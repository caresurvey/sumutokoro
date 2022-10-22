<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpot;

class DataRoomSizeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:spot_price_range';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '事業所の料金幅設定';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        dump('料金幅変更前'); exit;

        // 波の置き換え
        $eloquentSpot = new EloquentSpot();
        $spots = $eloquentSpot
            ->where('room_size', 'LIKE', '%' . '～' . '%')
            ->pluck('room_size', 'id');
        $results = [];
        foreach($spots as $id => $room_size) {
            $eloquentSpot = new EloquentSpot();
            $save = $eloquentSpot->where('id', $id)->update([
                'id' => $id,
                'room_size' => str_replace('～', '〜', $room_size),
            ]);
        }

        // 複数部屋の指定
        $eloquentSpot = new EloquentSpot();
        $spots = $eloquentSpot
            ->where('room_size', 'LIKE', '%' . '〜' . '%')
            ->pluck('room_size', 'id');

        $results = [];
        foreach($spots as $id => $room_size) {
            $eloquentSpot = new EloquentSpot();
            $save = $eloquentSpot->where('id', $id)->update([
                'id' => $id,
                'space_id' => 3,
            ]);
        }

        // 10畳以上

        dump('変更済み');
        return Command::SUCCESS;
    }
}
