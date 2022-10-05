<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert([
        'id' => 1,
        'display' => 1,
        'name' =>  'システム管理者',
        'serial' => 'root',
        'description' =>  'システム全体に関して全権限をもつ管理ユーザーです（社内のみ）',
        'reorder' => 1,
      ]);
      DB::table('roles')->insert([
        'id' => 2,
        'display' => 1,
        'name' =>  'サイト管理者',
        'serial' => 'admin',
        'description' =>  '利用に関して全権限をもつ管理ユーザーです（社内のみ）',
        'reorder' => 2,
      ]);
      DB::table('roles')->insert([
        'id' => 3,
        'display' => 1,
        'name' =>  '登録ユーザー',
        'serial' => 'user',
        'description' =>  '閲覧と紐付いた事業所のみの修正に関しての権限をもつ一般ユーザーです',
        'reorder' => 3,
      ]);
      DB::table('roles')->insert([
        'id' => 4,
        'display' => 1,
        'name' =>  '閲覧ユーザー',
        'serial' => 'visitor',
        'description' =>  '閲覧に関しての権限をもつユーザーです。社外ユーザーを含みます',
        'reorder' => 4,
      ]);
      DB::table('roles')->insert([
        'id' => 5,
        'display' => 1,
        'name' =>  'ゲスト',
        'serial' => 'guest',
        'description' =>  'ほぼ権限を持たない一時的なユーザーです。通常は使われません',
        'reorder' => 5,
      ]);
    }
}
