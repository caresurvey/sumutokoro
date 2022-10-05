<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class SpotIconGenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spot_icon_genres')->insert([
            'id' => 1,
            'display' => 0,
            'name' => '指定なし',
            'serial' => 'empty',
            'description' => '',
            'reorder' =>  1,
        ]);
        DB::table('spot_icon_genres')->insert([
            'id' => 2,
            'display' => 1,
            'name' => '対応種別',
            'serial' => 'status',
            'description' => '',
            'reorder' =>  2,
        ]);
        DB::table('spot_icon_genres')->insert([
            'id' => 3,
            'display' => 1,
            'name' => '看護体制',
            'serial' => 'nursing',
            'description' => '',
            'reorder' =>  3,
        ]);
        DB::table('spot_icon_genres')->insert([
            'id' => 4,
            'display' => 1,
            'name' => '介護体制',
            'serial' => 'care',
            'description' => '',
            'reorder' =>  5,
        ]);
        DB::table('spot_icon_genres')->insert([
            'id' => 5,
            'display' => 1,
            'name' => '個室内状況',
            'serial' => 'privatespace',
            'description' => '',
            'reorder' =>  5,
        ]);
        DB::table('spot_icon_genres')->insert([
            'id' => 6,
            'display' => 1,
            'name' => '食事体制',
            'serial' => 'eating',
            'description' => '',
            'reorder' =>  6,
        ]);
        DB::table('spot_icon_genres')->insert([
            'id' => 7,
            'display' => 1,
            'name' => '健康管理サービス',
            'serial' => 'health',
            'description' => '',
            'reorder' =>  7,
        ]);
        DB::table('spot_icon_genres')->insert([
            'id' => 8,
            'display' => 1,
            'name' => '生活サービス',
            'serial' => 'life',
            'description' => '',
            'reorder' =>  8,
        ]);
        DB::table('spot_icon_genres')->insert([
            'id' => 9,
            'display' => 1,
            'name' => '入院時サービス',
            'serial' => 'hospitalization',
            'description' => '',
            'reorder' =>  9,
        ]);
        DB::table('spot_icon_genres')->insert([
            'id' => 10,
            'display' => 1,
            'name' => 'その他項目',
            'serial' => 'other',
            'description' => '',
            'reorder' =>  10,
        ]);
    }
}

