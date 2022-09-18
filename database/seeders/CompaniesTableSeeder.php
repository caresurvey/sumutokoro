<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            DB::table('companies')->insert([
              'id' => $i,
              'display' => 1,
              'preview' => 1,
              'name' => '法人' . $i,
              'longname' => '法人フルネーム' . $i,
              'kana' => '法人ふりがな' . $i,
              'email' => 'test' . $i . '@test.co.jp',
              'zip1' => '070',
              'zip2' => '0000',
              'address' => '住所' . $i,
              'tel1' => '0' . $i,
              'tel2' => '1' . $i,
              'tel3' => '2' . $i,
              'fax' => 'FAX' . $i,
              'lat' => '43.000000',
              'lng' => '143.000000',
              'msg' => 'コメント' . $i,
              'start' => '法人開始' . $i,
              'president' => '代表' . $i,
              'history' => '社歴' . $i .'歳',
              'capital' => '資本金' . $i,
              'staff' => 'スタッフ' . $i,
              'search_words' => '法人' . $i,
              'area_branch_id' => 2,
              'city_id' => 2,
              'prefecture_id' => 2,
              'trade_area_id' => 2,
              'user_id' => 1,
            ]);
        }
    }
}
