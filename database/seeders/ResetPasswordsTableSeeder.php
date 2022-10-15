<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class ResetPasswordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reset_passwords')->insert([
          'id' => 1,
          'email' => 'user@hoge.co.jp',
          'token' => Hash::make('user@hoge.co.jp' . date("Ymd")),
        ]);
    }
}
