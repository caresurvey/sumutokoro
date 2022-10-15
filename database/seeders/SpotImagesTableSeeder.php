<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class SpotImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('spot_images')->insert([
              'id' => $i,
              'display' => 1,
              'name' => $i . '_0000',
              'tag' => 'main',
              'msg' => 'キャプション' . $i,
              'reorder' => $i,
              'spot_id' => $i,
              'user_id' => $i,
            ]);
        }
    }
}
