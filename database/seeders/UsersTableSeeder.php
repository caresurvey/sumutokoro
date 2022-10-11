<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'id' => 1,
          'enabled' => 1,
          'name' => 'システム管理者',
          'kana' => 'しすてむかんりしゃ',
          'zip1' => '070',
          'zip2' => '0000',
          'tel1' => '090',
          'tel2' => '000',
          'tel3' => '0000',
          'address' => '中央区1条1丁目1-1',
          'fax' => '000-000-0000',
          'email' => 'root@hoge.co.jp',
          'password' => '$2y$10$AMBsCklr6fImez8AUN3vzeT5llPe3yfjH0lwcDOW3qMOWgFYWDLLW',
          'is_authenticated' => 1,
          'authenticated_msg' => '承認済みメッセージ',
          'authenticated_date' => '2022-01-01 11:22:33',
          'company' => '所属している事業所や法人',
          'lat' => 43.00000,
          'lng' => 143.00000,
          'msg' => '備考',
          'reorder' => 1,
          'prefecture_id' => 2,
          'city_id' => 2,
          'role_id' => 1,
          'trade_area_id' => 1,
          'user_type_id' => 1,
          'user_id' => 1,
        ]);
        DB::table('users')->insert([
          'id' => 2,
          'enabled' => 1,
          'name' => 'サイト管理者',
          'kana' => 'さいとかんりしゃ',
          'zip1' => '070',
          'zip2' => '0000',
          'tel1' => '090',
          'tel2' => '000',
          'tel3' => '0000',
          'address' => '中央区1条1丁目1-1',
          'fax' => '000-000-0000',
          'email' => 'admin@hoge.co.jp',
          'password' => '$2y$10$AMBsCklr6fImez8AUN3vzeT5llPe3yfjH0lwcDOW3qMOWgFYWDLLW',
          'is_authenticated' => 1,
          'authenticated_msg' => '承認済みメッセージ',
          'authenticated_date' => '2022-01-01 11:22:33',
          'company' => '所属している事業所や法人',
          'lat' => 43.00000,
          'lng' => 143.00000,
          'msg' => '備考',
          'reorder' => 1,
          'prefecture_id' => 2,
          'city_id' => 2,
          'role_id' => 2,
          'trade_area_id' => 1,
          'user_type_id' => 1,
          'user_id' => 1,
        ]);
        DB::table('users')->insert([
          'id' => 3,
          'enabled' => 1,
          'name' => '一般登録ユーザー',
          'kana' => 'いっぱんとうろくゆーざー',
          'zip1' => '070',
          'zip2' => '0000',
          'tel1' => '090',
          'tel2' => '000',
          'tel3' => '0000',
          'address' => '中央区1条1丁目1-1',
          'fax' => '000-000-0000',
          'email' => 'user@hoge.co.jp',
          'password' => '$2y$10$AMBsCklr6fImez8AUN3vzeT5llPe3yfjH0lwcDOW3qMOWgFYWDLLW',
          'is_authenticated' => 1,
          'authenticated_msg' => '承認済みメッセージ',
          'authenticated_date' => '2022-01-01 11:22:33',
          'company' => '所属している事業所や法人',
          'lat' => 43.00000,
          'lng' => 143.00000,
          'msg' => '備考',
          'reorder' => 1,
          'prefecture_id' => 2,
          'city_id' => 2,
          'role_id' => 3,
          'trade_area_id' => 1,
          'user_type_id' => 1,
          'user_id' => 1,
        ]);

        for ($i = 4; $i <= 99; $i++) {
          DB::table('users')->insert([
            'id' => $i,
            'enabled' => 1,
            'name' => '一般閲覧ユーザー',
            'kana' => 'いっぱんえつらんゆーざー',
            'zip1' => '070',
            'zip2' => '0000',
            'tel1' => '090',
            'tel2' => '000',
            'tel3' => '0000',
            'address' => '中央区1条1丁目1-1',
            'fax' => '000-000-0000',
            'email' => 'visitor' . $i . '@hoge.co.jp',
            'password' => '$2y$10$AMBsCklr6fImez8AUN3vzeT5llPe3yfjH0lwcDOW3qMOWgFYWDLLW',
            'is_authenticated' => 0,
            'authenticated_msg' => '承認済みメッセージ',
            'company' => '所属している事業所や法人',
            'lat' => 43.00000,
            'lng' => 143.00000,
            'msg' => '備考',
            'reorder' => 1,
            'prefecture_id' => 2,
            'city_id' => 2,
            'role_id' => 4,
            'trade_area_id' => 1,
            'user_type_id' => 1,
            'user_id' => 1,
          ]);
        }

        DB::table('users')->insert([
          'id' => 100,
          'enabled' => 1,
          'name' => 'ゲスト',
          'kana' => 'げすと',
          'zip1' => '070',
          'zip2' => '0000',
          'tel1' => '090',
          'tel2' => '000',
          'tel3' => '0000',
          'address' => '中央区1条1丁目1-1',
          'fax' => '000-000-0000',
          'email' => 'guest@hoge.co.jp',
          'password' => '$2y$10$AMBsCklr6fImez8AUN3vzeT5llPe3yfjH0lwcDOW3qMOWgFYWDLLW',
          'is_authenticated' => 0,
          'authenticated_msg' => '承認済みメッセージ',
          'company' => '所属している事業所や法人',
          'lat' => 43.00000,
          'lng' => 143.00000,
          'msg' => '備考',
          'reorder' => 1,
          'prefecture_id' => 2,
          'city_id' => 2,
          'role_id' => 5,
          'trade_area_id' => 1,
          'user_type_id' => 1,
          'user_id' => 1,
        ]);
    }

}

