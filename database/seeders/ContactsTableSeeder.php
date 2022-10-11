<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            DB::table('contacts')->insert([
              'id' => $i,
              'name' => 'お問い合わせ' . $i,
              'kana' => '法人ふりがな' . $i,
              'email' => 'test' . $i . '@test.co.jp',
              'tel' => '011-123-4567',
              'reply' => 'ご返答方法',
              'msg' => 'お問い合わせ内容' . $i,
              'ip' => '123.456.789.000',
            ]);
        }
    }
}
