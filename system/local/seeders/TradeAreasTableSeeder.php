<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class TradeAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trade_areas')->insert([
            'id' => 1,
            'display' => 1, 
            'serial' => 'asahikawa1',
            'name' => '旭川1次',
            'reorder' =>  2,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 2,
            'display' => 1,
            'serial' => 'asahikawa2',
            'name' => '旭川2次',
            'reorder' =>  3,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 3,
            'display' => 1,
            'serial' => 'asahikawa3',
            'name' => '旭川3次',
            'reorder' =>  4,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 4,
            'display' => 1,
            'serial' => 'iburihidaka1', 
            'name' => '胆振・日高1次',
            'reorder' =>  5,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 5,
            'display' => 1,
            'serial' => 'iburihidaka2', 
            'name' => '胆振・日高2次',
            'reorder' =>  6,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 6,
            'display' => 1,
            'serial' => 'iburihidaka3', 
            'name' => '胆振・日高3次',
            'reorder' =>  7,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 7,
            'display' => 1,
            'serial' => 'obihiro1', 
            'name' => '帯広1次',
            'reorder' =>  8,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 8,
            'display' => 1,
            'serial' => 'obihiro2', 
            'name' => '帯広2次',
            'reorder' =>  9,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 9,
            'display' => 1,
            'serial' => 'obihiro3', 
            'name' => '帯広3次',
            'reorder' =>  10,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 10,
            'display' => 1,
            'serial' => 'kitami1', 
            'name' => '北見1次',
            'reorder' => 11,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 11,
            'display' => 1,
            'serial' => 'kitami2', 
            'name' => '北見2次',
            'reorder' => 12,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 12,
            'display' => 1,
            'serial' => 'kitami3', 
            'name' => '北見3次',
            'reorder' => 13,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 13,
            'display' => 1,
            'serial' => 'kushiro1', 
            'name' => '釧路1次',
            'reorder' => 14,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 14,
            'display' => 1,
            'serial' => 'kushiro2', 
            'name' => '釧路2次',
            'reorder' => 15,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 15,
            'display' => 1,
            'serial' => 'kushiro3', 
            'name' => '釧路3次',
            'reorder' => 16,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 16,
            'display' => 1,
            'serial' => 'sapporo1', 
            'name' => '札幌1次',
            'reorder' => 17,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 17,
            'display' => 1,
            'serial' => 'sapporo2', 
            'name' => '札幌2次',
            'reorder' => 18,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 18,
            'display' => 1,
            'serial' => 'sapporo3', 
            'name' => '札幌3次',
            'reorder' => 19,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 19,
            'display' => 1,
            'serial' => 'hakodate1', 
            'name' => '函館1次',
            'reorder' => 20,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 20,
            'display' => 1,
            'serial' => 'hakodate2', 
            'name' => '函館2次',
            'reorder' => 21,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 21,
            'display' => 1,
            'serial' => 'hakodate3', 
            'name' => '函館3次',
            'reorder' => 22,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 22,
            'display' => 1,
            'serial' => 'wakkanai1', 
            'name' => '稚内1次',
            'reorder' => 23,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 23,
            'display' => 1,
            'serial' => 'wakkanai2', 
            'name' => '稚内2次',
            'reorder' => 24,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 24,
            'display' => 1,
            'serial' => 'wakkanai3', 
            'name' => '稚内3次',
            'reorder' => 25,
        ]);
        DB::table('trade_areas')->insert([
            'id' => 25,
            'display' => 0,
            'serial' => 'no', 
            'name' => '指定なし',
            'reorder' => 1,
        ]);
    }
}

