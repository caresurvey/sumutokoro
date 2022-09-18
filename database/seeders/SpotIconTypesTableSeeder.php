<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class SpotIconTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spot_icon_types')->insert([
            'id' => 1,
            'name' => '未選択',
            'icon' => '-',
            'serial' => 'empty',
            'description' => '',
            'reorder' =>  1,
        ]);
        DB::table('spot_icon_types')->insert([
            'id' => 2,
            'name' => '対応していません',
            'icon' => '×',
            'serial' => 'cross',
            'description' => '',
            'reorder' =>  2,
        ]);
        DB::table('spot_icon_types')->insert([
            'id' => 3,
            'name' => '要問い合わせ',
            'icon' => '△',
            'serial' => 'triangle',
            'description' => '',
            'reorder' =>  3,
        ]);
        DB::table('spot_icon_types')->insert([
            'id' => 4,
            'name' => '対応可能です',
            'icon' => '○',
            'serial' => 'circle',
            'description' => '',
            'reorder' =>  4,
        ]);
        DB::table('spot_icon_types')->insert([
            'id' => 5,
            'name' => '対応可かつ対応実績あり',
            'icon' => '◎',
            'serial' => 'double_circle',
            'description' => '',
            'reorder' =>  5,
        ]);
    }
}

