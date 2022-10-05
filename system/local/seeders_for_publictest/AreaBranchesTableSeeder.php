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
            'public' => 0, 
            'serial' => 'empty',
            'code' => '00',
            'name' => '指定なし',
            'reorder' =>  1,
        ]);
        DB::table('area_branches')->insert([
            'id' => 2,
            'display' => 1, 
            'public' => 1, 
            'serial' => 'ishikari', 
            'code' => '01', 
            'name' => '石狩',
            'reorder' =>  2,
        ]);
        DB::table('area_branches')->insert([
            'id' => 3,
            'display' => 1, 
            'public' => 1, 
            'serial' => 'oshima', 
            'code' => '02', 
            'name' => '渡島',
            'reorder' => 3,
        ]);
        DB::table('area_branches')->insert([
            'id' => 4,
            'display' => 1, 
            'public' => 1, 
            'serial' => 'hiyama', 
            'code' => '03', 
            'name' => '檜山',
            'reorder' => 4,
        ]);
        DB::table('area_branches')->insert([
            'id' => 5,
            'display' => 1, 
            'public' => 1, 
            'serial' => 'kunashiri', 
            'code' => '04', 
            'name' => '後志',
            'reorder' =>  5,
        ]);
        DB::table('area_branches')->insert([
            'id' => 6,
            'display' => 1, 
            'public' => 1, 
            'serial' => 'sorachi', 
            'code' => '05', 
            'name' => '空知',
            'reorder' =>  6,
        ]);
        DB::table('area_branches')->insert([
            'id' => 7,
            'display' => 1, 
            'public' => 1, 
            'serial' => 'kamikawa', 
            'code' => '06', 
            'name' => '上川',
            'reorder' =>  7,
        ]);
        DB::table('area_branches')->insert([
            'id' => 8,
            'display' => 1, 
            'public' => 1, 
            'serial' => 'rumoi', 
            'code' => '07', 
            'name' => '留萌',
            'reorder' =>  8,
        ]);
        DB::table('area_branches')->insert([
            'id' => 9,
            'display' => 1, 
            'public' => 1, 
            'serial' => 'souya', 
            'code' => '08', 
            'name' => '宗谷',
            'reorder' => 9,
        ]);
        DB::table('area_branches')->insert([
            'id' => 10,
            'display' => 1, 
            'public' => 1, 
            'serial' => 'ohotsuku', 
            'code' => '09', 
            'name' => 'オホーツク',
            'reorder' => 10,
        ]);
        DB::table('area_branches')->insert([
            'id' => 11,
            'display' => 1, 
            'public' => 1, 
            'serial' => 'iburi', 
            'code' => '10', 
            'name' => '胆振',
            'reorder' => 11,
        ]);
        DB::table('area_branches')->insert([
            'id' => 12,
            'display' => 1, 
            'public' => 1, 
            'serial' => 'hidaka', 
            'code' => '11', 
            'name' => '日高',
            'reorder' => 12,
        ]);
        DB::table('area_branches')->insert([
            'id' => 13,
            'display' => 1, 
            'public' => 1, 
            'serial' => 'tokachi', 
            'code' => '12', 
            'name' => '十勝',
            'reorder' =>  13,
        ]);
        DB::table('area_branches')->insert([
            'id' => 14,
            'display' => 1, 
            'public' => 1, 
            'serial' => 'kushirocho', 
            'code' => '13', 
            'name' => '釧路',
            'reorder' =>  14,
        ]);
        DB::table('area_branches')->insert([
            'id' => 15,
            'display' => 1, 
            'public' => 1, 
            'serial' => 'nemuro', 
            'code' => '14', 
            'name' => '根室',
            'reorder' => 15,
        ]);
    }
}

