<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            'id' => 1,
            'display' => 1, 
            'public' => 1,
            'name' => '設定なし・不明',
            'serial' => 'empty',
            'description' => '',
            'reorder' =>  6,
        ]);
        DB::table('user_types')->insert([
            'id' => 2,
            'display' => 1,
            'public' => 0,
            'name' => '運営向け',
            'serial' => 'admin',
            'description' => '',
            'reorder' =>  1,
        ]);
        DB::table('user_types')->insert([
            'id' => 3,
            'display' => 1,
            'public' => 0,
            'name' => '一般の方',
            'serial' => 'user_general',
            'description' => '',
            'reorder' =>  2,
        ]);
        DB::table('user_types')->insert([
            'id' => 4,
            'display' => 1,
            'public' => 1,
            'name' => '専門員・病院関係者',
            'serial' => 'user_professional',
            'description' => '',
            'reorder' =>  3,
        ]);
        DB::table('user_types')->insert([
            'id' => 5,
            'display' => 1,
            'public' => 1,
            'name' => '介護事業所・スタッフ',
            'serial' => 'user_spot',
            'description' => '',
            'reorder' =>  4,
        ]);
        DB::table('user_types')->insert([
            'id' => 6,
            'display' => 1,
            'public' => 1,
            'name' => '事業所を運営する法人',
            'serial' => 'user_company',
            'description' => '',
            'reorder' =>  5,
        ]);
    }
}

