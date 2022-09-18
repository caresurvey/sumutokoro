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
            'id' => 0,
            'display' => 1, 
            'name' => '指定なし',
            'reorder' =>  1,
        ]);
        DB::table('spaces')->insert([
            'id' => 2,
            'display' => 1,
            'name' => '4〜6畳',
            'reorder' =>  2,
        ]);
        DB::table('spaces')->insert([
            'id' => 3,
            'display' => 1,
            'name' => '7〜10畳',
            'reorder' =>  3,
        ]);
        DB::table('spaces')->insert([
            'id' => 4,
            'display' => 1,
            'name' => '10畳以上',
            'reorder' =>  4,
        ]);
    }
}

