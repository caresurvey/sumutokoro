<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class AreaBranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('area_branches')->insert([
            'id' => 1,
            'display' => 1, 
            'serial' => 'empty',
            'code' => '000',
            'name' => '指定なし',
            'reorder' =>  1,
        ]);
        DB::table('area_branches')->insert([
            'id' => 2,
            'display' => 1,
            'serial' => 'ishikari', 
            'code' => '300', 
            'name' => '石狩',
            'reorder' =>  2,
        ]);
        DB::table('area_branches')->insert([
            'id' => 3,
            'display' => 1,
            'serial' => 'kamikawa', 
            'code' => '450', 
            'name' => '上川',
            'reorder' =>  3,
        ]);
        DB::table('area_branches')->insert([
            'id' => 4,
            'display' => 1,
            'serial' => 'tokachi', 
            'code' => '630', 
            'name' => '十勝',
            'reorder' =>  4,
        ]);
        DB::table('area_branches')->insert([
            'id' => 5,
            'display' => 1,
            'serial' => 'kunashiri', 
            'code' => '390', 
            'name' => '国後',
            'reorder' =>  5,
        ]);
        DB::table('area_branches')->insert([
            'id' => 6,
            'display' => 1,
            'serial' => 'kushirocho', 
            'code' => '660', 
            'name' => '釧路',
            'reorder' =>  6,
        ]);
        DB::table('area_branches')->insert([
            'id' => 7,
            'display' => 1,
            'serial' => 'sorachi', 
            'code' => '420', 
            'name' => '空知',
            'reorder' =>  7,
        ]);
        DB::table('area_branches')->insert([
            'id' => 8,
            'display' => 1,
            'serial' => 'hiyama', 
            'code' => '360', 
            'name' => '檜山',
            'reorder' =>  8,
        ]);
        DB::table('area_branches')->insert([
            'id' => 9,
            'display' => 1,
            'serial' => 'rumoi', 
            'code' => '480', 
            'name' => '留萌',
            'reorder' =>  9,
        ]);
        DB::table('area_branches')->insert([
            'id' => 10,
            'display' => 1,
            'serial' => 'souya', 
            'code' => '510', 
            'name' => '宗谷',
            'reorder' => 10,
        ]);
        DB::table('area_branches')->insert([
            'id' => 11,
            'display' => 1,
            'serial' => 'ohotsuku', 
            'code' => '540', 
            'name' => 'オホーツク',
            'reorder' => 11,
        ]);
        DB::table('area_branches')->insert([
            'id' => 12,
            'display' => 1,
            'serial' => 'nemuro', 
            'code' => '690', 
            'name' => '根室',
            'reorder' => 12,
        ]);
        DB::table('area_branches')->insert([
            'id' => 13,
            'display' => 1,
            'serial' => 'iburi', 
            'code' => '570', 
            'name' => '胆振',
            'reorder' => 13,
        ]);
        DB::table('area_branches')->insert([
            'id' => 14,
            'display' => 1,
            'serial' => 'hidaka', 
            'code' => '600', 
            'name' => '日高',
            'reorder' => 14,
        ]);
        DB::table('area_branches')->insert([
            'id' => 15,
            'display' => 1,
            'serial' => 'oshima', 
            'code' => '330', 
            'name' => '渡島',
            'reorder' => 15,
        ]);
    }
}

