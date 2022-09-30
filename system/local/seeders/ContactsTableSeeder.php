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
              'name' => '問合太郎' . $i,
              'kana' => 'といあいたろう' . $i,
              'email' => 'test' . $i . '@test.co.jp',
              'tel' => '090-1111-222' . $i,
              'reply' => 'メールで返答',
              'msg' => 'コメント' . $i,
              'ip' => '111.222.333.4' . $i,
            ]);
        }
    }
}
