<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            DB::table('logs')->insert([
              'id' => $i,
              'log' => 'ログ' . $i,
              'prefix' => 'admin',
              'page' => 'spot',
              'action' => 'store',
              'column_id' => 1,
              'value' => 'value',
              'ip' => '111.222.333.444',
              'user_name' => 'ユーザー名',
              'user_id' => 1,
            ]);
        }
    }
}
