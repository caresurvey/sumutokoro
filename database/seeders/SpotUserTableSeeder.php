<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class SpotUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('spot_user')->insert([
                'id' => $i,
                'spot_id' => $i,
                'user_id' => 1,
            ]);
        }
        for ($i = 11; $i <= 20; $i++) {
            DB::table('spot_user')->insert([
                'id' => $i,
                'spot_id' => $i-10,
                'user_id' => 3,
            ]);
        }
    }
}

