<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class SpotPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=20; $i++) {
            for ($i2=2; $i2<=7; $i2++) {
                DB::table('spot_prices')->insert([
                    'name' => '内容' . $i . '_' . $i2,
                    'description' => '説明' . $i . '_' . $i2,
                    'ps' => '例：例文を入れます' . $i2,
                    'reorder' => $i2 -1,
                    'price_genre_id' => $i2,
                    'spot_id' => $i,
                    'user_id' => 1,
                ]);
            }
        }
    }
}
