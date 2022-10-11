<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class SpotIconStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=100; $i++) {
            $item=2;
            for ($status=1; $status<=6; $status++) {
                DB::table('spot_icon_statuses')->insert([
                    'spot_icon_item_id' => $item,
                    'spot_icon_type_id' => 1,
                    'spot_icon_genre_id' => 2,
                    'spot_id' => $i,
                    'user_id' => 1,
                ]);
                $item++;
            }
            for ($nursing=1; $nursing<=15; $nursing++) {
                DB::table('spot_icon_statuses')->insert([
                    'spot_icon_item_id' => $item,
                    'spot_icon_type_id' => 1,
                    'spot_icon_genre_id' => 3,
                    'spot_id' => $i,
                    'user_id' => 1,
                ]);
                $item++;
            }
            for ($care=1; $care<=10; $care++) {
                DB::table('spot_icon_statuses')->insert([
                    'spot_icon_item_id' => $item,
                    'spot_icon_type_id' => 1,
                    'spot_icon_genre_id' => 4,
                    'spot_id' => $i,
                    'user_id' => 1,
                ]);
                $item++;
            }
            for ($privatespace=1; $privatespace<=7; $privatespace++) {
                DB::table('spot_icon_statuses')->insert([
                    'spot_icon_item_id' => $item,
                    'spot_icon_type_id' => 1,
                    'spot_icon_genre_id' => 5,
                    'spot_id' => $i,
                    'user_id' => 1,
                ]);
                $item++;
            }
            for ($eating=1; $eating<=5; $eating++) {
                DB::table('spot_icon_statuses')->insert([
                    'spot_icon_item_id' => $item,
                    'spot_icon_type_id' => 1,
                    'spot_icon_genre_id' => 6,
                    'spot_id' => $i,
                    'user_id' => 1,
                ]);
                $item++;
            }
            for ($health=1; $health<=5; $health++) {
                DB::table('spot_icon_statuses')->insert([
                    'spot_icon_item_id' => $item,
                    'spot_icon_type_id' => 1,
                    'spot_icon_genre_id' => 7,
                    'spot_id' => $i,
                    'user_id' => 1,
                ]);
                $item++;
            }
            for ($life=1; $life<=8; $life++) {
                DB::table('spot_icon_statuses')->insert([
                    'spot_icon_item_id' => $item,
                    'spot_icon_type_id' => 1,
                    'spot_icon_genre_id' => 8,
                    'spot_id' => $i,
                    'user_id' => 1,
                ]);
                $item++;
            }
            for ($hospitalization=1; $hospitalization<=4; $hospitalization++) {
                DB::table('spot_icon_statuses')->insert([
                    'spot_icon_item_id' => $item,
                    'spot_icon_type_id' => 1,
                    'spot_icon_genre_id' => 9,
                    'spot_id' => $i,
                    'user_id' => 1,
                ]);
                $item++;
            }
            for ($other=1; $other<=5; $other++) {
                DB::table('spot_icon_statuses')->insert([
                    'spot_icon_item_id' => $item,
                    'spot_icon_type_id' => 1,
                    'spot_icon_genre_id' => 10,
                    'spot_id' => $i,
                    'user_id' => 1,
                ]);
                $item++;
            }
        }
    }
}

