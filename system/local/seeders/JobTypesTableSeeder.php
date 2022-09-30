<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class JobTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_types')->insert([
            'id' => 1,
            'display' => 1, 
            'public' => 1,
            'name' => '設定なし・不明',
            'serial' => 'empty',
            'description' => '',
            'reorder' =>  8,
        ]);
        DB::table('job_types')->insert([
            'id' => 2,
            'display' => 1, 
            'public' => 1,
            'name' => 'その他',
            'serial' => 'other',
            'description' => '',
            'reorder' =>  7,
        ]);
        DB::table('job_types')->insert([
            'id' => 3,
            'display' => 1,
            'public' => 0,
            'name' => 'MSW',
            'serial' => 'msw',
            'description' => '',
            'reorder' =>  1,
        ]);
        DB::table('job_types')->insert([
            'id' => 4,
            'display' => 1,
            'public' => 0,
            'name' => 'ケアマネジャー',
            'serial' => 'care_manager',
            'description' => '',
            'reorder' =>  2,
        ]);
        DB::table('job_types')->insert([
            'id' => 5,
            'display' => 1,
            'public' => 1,
            'name' => 'PSW',
            'serial' => 'psw',
            'description' => '',
            'reorder' =>  3,
        ]);
        DB::table('job_types')->insert([
            'id' => 6,
            'display' => 1,
            'public' => 1,
            'name' => '相談員',
            'serial' => 'counselor',
            'description' => '',
            'reorder' =>  4,
        ]);
        DB::table('job_types')->insert([
            'id' => 7,
            'display' => 1,
            'public' => 1,
            'name' => '看護師',
            'serial' => 'nurse',
            'description' => '',
            'reorder' =>  5,
        ]);
        DB::table('job_types')->insert([
            'id' => 8,
            'display' => 1,
            'public' => 1,
            'name' => '保健師',
            'serial' => 'public_health_nurse',
            'description' => '',
            'reorder' =>  6,
        ]);
    }
}

