<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'id' => 1,
            'display' => 0,
            'name' => '指定なし',
            'serial' => 'empty',
            'sellout' => '2017-01-01',
            'reorder' => 1,
            'user_id' => 1,
          ]
        );
        DB::table('books')->insert([
            'id' => 2,
            'display' => 1,
            'name' => 'すむところ2017 旭川版',
            'serial' => 'asahikawa2017',
            'sellout' => '2017-06-29',
            'reorder' => 2,
            'user_id' => 1,
          ]
        );
        DB::table('books')->insert([
            'id' => 3,
            'display' => 1,
            'name' => '旭川・道北エリア',
            'serial' => 'dohoku',
            'sellout' => '2018-05-26',
            'reorder' => 3,
            'user_id' => 1,
          ]
        );
        DB::table('books')->insert([
            'id' => 4,
            'display' => 1,
            'name' => '札幌・道央エリア',
            'serial' => 'douo',
            'sellout' => '2018-10-29',
            'reorder' => 4,
            'user_id' => 1,
          ]
        );
        DB::table('books')->insert([
            'id' => 5,
            'display' => 1,
            'name' => '永山包括',
            'serial' => 'nagayama',
            'sellout' => '2019-07-06',
            'reorder' => 5,
            'user_id' => 1,
          ]
        );
        DB::table('books')->insert([
            'id' => 6,
            'display' => 1,
            'name' => '北見・釧路・帯広・道東エリア',
            'serial' => 'doto',
            'sellout' => '2021-01-21',
            'reorder' => 6,
            'user_id' => 1,
          ]
        );
        DB::table('books')->insert([
            'id' => 7,
            'display' => 1,
            'name' => '函館・苫小牧・小樽・道南版',
            'serial' => 'donan',
            'sellout' => '2021-01-21',
            'reorder' => 7,
            'user_id' => 1,
          ]
        );

    }
}
