<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            DB::table('news')->insert([
              'id' => $i,
              'display' => 1,
              'preview' => 1,
              'name' => 'タイトル' . $i,
              'body' => '本文' . $i,
              'more' => '追加' . $i,
              'url' => 'https://hogehoge' . $i . '.co.jp',
              'user_id' => 1,
            ]);
        }
    }
}
