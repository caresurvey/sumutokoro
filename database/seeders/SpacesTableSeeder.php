<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class SpacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spaces')->insert([
            'id' => 1,
            'display' => 1, 
            'name' => '指定なし',
            'reorder' =>  1,
        ]);
        DB::table('spaces')->insert([
            'id' => 2,
            'display' => 1, 
            'name' => 'その他・不明',
            'reorder' =>  2,
        ]);
        DB::table('spaces')->insert([
            'id' => 3,
            'display' => 1,
            'name' => '複数種類あり',
            'reorder' =>  3,
        ]);
        DB::table('spaces')->insert([
            'id' => 4,
            'display' => 1,
            'name' => '4〜6畳',
            'reorder' =>  4,
        ]);
        DB::table('spaces')->insert([
            'id' => 5,
            'display' => 1,
            'name' => '7〜10畳',
            'reorder' =>  5,
        ]);
        DB::table('spaces')->insert([
            'id' => 6,
            'display' => 1,
            'name' => '10畳以上',
            'reorder' =>  6,
        ]);
    }
}

