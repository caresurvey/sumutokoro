<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class PriceRangesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('price_ranges')->insert([
            'id' => 1,
            'display' => 1, 
            'public' => 1,
            'name' => '指定なし',
            'min' => 0,
            'max' => 0,
            'reorder' => 1,
        ]);
        DB::table('price_ranges')->insert([
            'id' => 2,
            'display' => 1,
            'public' => 1,
            'name' => '〜5万円',
            'min' => 0,
            'max' => 50000,
            'reorder' => 2,
        ]);
        DB::table('price_ranges')->insert([
            'id' => 3,
            'display' => 1,
            'public' => 1,
            'name' => '〜10万円',
            'min' => 0,
            'max' => 100000,
            'reorder' => 3,
        ]);
        DB::table('price_ranges')->insert([
            'id' => 4,
            'display' => 1,
            'public' => 1,
            'name' => '〜15万円',
            'min' => 0,
            'max' => 150000,
            'reorder' => 4,
        ]);
        DB::table('price_ranges')->insert([
            'id' => 5,
            'display' => 1,
            'public' => 1,
            'name' => '〜20万円',
            'min' => 0,
            'max' => 200000,
            'reorder' => 5,
        ]);
        DB::table('price_ranges')->insert([
            'id' => 6,
            'display' => 1,
            'public' => 1,
            'name' => '20万円〜',
            'min' => 200000,
            'max' => 0,
            'reorder' => 6,
        ]);
    }
}

