<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class SpotPlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spot_plans')->insert([
            'id' => 1,
            'display' => 1,
            'name' => '未確認',
            'description' => '確認が済んでいません。',
            'reorder' =>  1,
        ]);
        DB::table('spot_plans')->insert([
            'id' => 2,
            'display' => 1,
            'name' => '法人確認済み',
            'description' => '確認が済みました',
            'reorder' =>  2,
        ]);
        DB::table('spot_plans')->insert([
            'id' => 3,
            'display' => 0,
            'name' => 'プレミアム',
            'description' => '有料のプレミアムプランです。確認も完了済みで、管理ページにログインが可能なほか、様々なオプションを使用することができます。',
            'reorder' =>  3,
        ]);
    }
}

