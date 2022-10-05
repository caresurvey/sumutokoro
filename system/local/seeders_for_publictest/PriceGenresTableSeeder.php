<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class PriceGenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('price_genres')->insert([
            'id' => 1,
            'display' => 0,
            'name' => '指定なし',
            'serial' => 'empty',
            'description' => '',
            'ps' => '',
            'reorder' =>  1,
        ]);
        DB::table('price_genres')->insert([
            'id' => 2,
            'display' => 1,
            'name' => '家賃',
            'serial' => 'monthly',
            'description' => '',
            'ps' => '例：45,000円',
            'reorder' =>  2,
        ]);
        DB::table('price_genres')->insert([
            'id' => 3,
            'display' => 1,
            'name' => '管理費',
            'serial' => 'manage',
            'description' => '',
            'ps' => '例：35,000円',
            'reorder' =>  3,
        ]);
        DB::table('price_genres')->insert([
            'id' => 4,
            'display' => 1,
            'name' => '食費',
            'serial' => 'meal',
            'description' => '',
            'ps' => '例：25,000円',
            'reorder' =>  5,
        ]);
        DB::table('price_genres')->insert([
            'id' => 5,
            'display' => 1,
            'name' => '水道光熱費',
            'serial' => 'huel',
            'description' => '',
            'ps' => '例：15,000円',
            'reorder' =>  5,
        ]);
        DB::table('price_genres')->insert([
            'id' => 6,
            'display' => 1,
            'name' => '冬期暖房費',
            'serial' => 'winter',
            'description' => '',
            'ps' => '例：8,000円（9月〜3月）',
            'reorder' =>  6,
        ]);
        DB::table('price_genres')->insert([
            'id' => 7,
            'display' => 1,
            'name' => 'その他費用',
            'serial' => 'other',
            'description' => '',
            'ps' => '例：0円',
            'reorder' =>  7,
        ]);
    }
}

