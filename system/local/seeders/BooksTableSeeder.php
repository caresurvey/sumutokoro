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
            'display' => 1,
            'name' => '指定なし',
            'sellout' => '2017-01-01',
            'reorder' => 1,
            'user_id' => 1,
          ]
        );
        DB::table('books')->insert([
            'id' => 2,
            'display' => 1,
            'name' => 'すむところ2017 旭川版',
            'sellout' => '2017-06-29',
            'reorder' => 2,
            'user_id' => 1,
          ]
        );
        DB::table('books')->insert([
            'id' => 3,
            'display' => 1,
            'name' => '旭川版',
            'sellout' => '2018-05-26',
            'reorder' => 3,
            'user_id' => 1,
          ]
        );
        DB::table('books')->insert([
            'id' => 4,
            'display' => 1,
            'name' => '札幌版',
            'sellout' => '2018-10-29',
            'reorder' => 4,
            'user_id' => 1,
          ]
        );
        DB::table('books')->insert([
            'id' => 5,
            'display' => 1,
            'name' => '永山包括',
            'sellout' => '2019-07-06',
            'reorder' => 5,
            'user_id' => 1,
          ]
        );
        DB::table('books')->insert([
            'id' => 6,
            'display' => 1,
            'name' => '道東版',
            'sellout' => '2021-01-21',
            'reorder' => 6,
            'user_id' => 1,
          ]
        );
        DB::table('books')->insert([
            'id' => 7,
            'display' => 1,
            'name' => '道南版',
            'sellout' => '2021-01-21',
            'reorder' => 7,
            'user_id' => 1,
          ]
        );

    }
}
