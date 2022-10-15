<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class SpotDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('spot_details')->insert([
              'id' => $i,
              'kana' => '事業所ふりがな' . $i,
              'subname' => '事業所サブ名' . $i,
              'email' => 'test' . $i . '@test.co.jp',
              'feature' => '特徴' . $i,
              'rooms' => $i .'室',
              'staff' => 'スタッフ' . $i,
              'staffs' => 'スタッフ' . $i,
              'staff_age' => '平均' . $i .'歳',
              'nurses' => '看護士' . $i,
              'nurse_time' => '看護士滞在時間' . $i,
              'build_start' => '建築年 190' . $i,
              'open_start' => '開始年 190' . $i,
              'website' => 'WEBSITE' . $i,
              'introducer' => '紹介者' . $i,
              'phone' => '電話番号' . $i,
              'reserved_phone' => '0901234567' . $i,
              'fax' => 'FAX' . $i,
              'comment' => 'コメント' . $i,
              'comment2' => 'コメント' . $i,
              'company_name' => '法人名' . $i,
              'company_staff' => '法人スタッフ' . $i,
              'proarea' => 'エリア名',
              'spot_id' => $i,
            ]);
        }
    }
}
