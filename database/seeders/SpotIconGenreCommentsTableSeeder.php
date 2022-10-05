<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class SpotIconGenreCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('spot_icon_genre_comments')->insert([
                'display' => 1,
                'comment' => '指定なしコメント' . $i,
                'spot_icon_genre_id' =>  1,
                'spot_id' =>  $i,
                'user_id' =>  1,
            ]);
            DB::table('spot_icon_genre_comments')->insert([
                'display' => 1,
                'comment' => '対応種別コメント' . $i,
                'spot_icon_genre_id' =>  2,
                'spot_id' =>  $i,
                'user_id' =>  1,
            ]);
            DB::table('spot_icon_genre_comments')->insert([
                'display' => 1,
                'comment' => '看護体制コメント' . $i,
                'spot_icon_genre_id' =>  3,
                'spot_id' =>  $i,
                'user_id' =>  1,
            ]);
            DB::table('spot_icon_genre_comments')->insert([
                'display' => 1,
                'comment' => '介護体制コメント' . $i,
                'spot_icon_genre_id' =>  4,
                'spot_id' =>  $i,
                'user_id' =>  1,
            ]);
            DB::table('spot_icon_genre_comments')->insert([
                'display' => 1,
                'comment' => '個室内状況コメント' . $i,
                'spot_icon_genre_id' =>  5,
                'spot_id' =>  $i,
                'user_id' =>  1,
            ]);
            DB::table('spot_icon_genre_comments')->insert([
                'display' => 1,
                'comment' => '食事体制コメント' . $i,
                'spot_icon_genre_id' =>  6,
                'spot_id' =>  $i,
                'user_id' =>  1,
            ]);
            DB::table('spot_icon_genre_comments')->insert([
                'display' => 1,
                'comment' => '健康管理コメント' . $i,
                'spot_icon_genre_id' =>  7,
                'spot_id' =>  $i,
                'user_id' =>  1,
            ]);
            DB::table('spot_icon_genre_comments')->insert([
                'display' => 1,
                'comment' => '生活サービスコメント' . $i,
                'spot_icon_genre_id' =>  8,
                'spot_id' =>  $i,
                'user_id' =>  1,
            ]);
            DB::table('spot_icon_genre_comments')->insert([
                'display' => 1,
                'comment' => '入院時サービスコメント' . $i,
                'spot_icon_genre_id' =>  9,
                'spot_id' =>  $i,
                'user_id' =>  1,
            ]);
            DB::table('spot_icon_genre_comments')->insert([
                'display' => 1,
                'comment' => 'その他コメント' . $i,
                'spot_icon_genre_id' =>  10,
                'spot_id' =>  $i,
                'user_id' =>  1,
            ]);
        }
    }
}

