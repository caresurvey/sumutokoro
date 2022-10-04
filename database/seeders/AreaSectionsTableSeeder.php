<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class AreaSectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('area_sections')->insert([
            'id' => 1,
            'display' => 0,
            'name' => '指定なし',
            'book_label' => '',
            'reorder' => 1,
            'book_reorder' => 1,
            'book_id' => 1,
            'user_id' => 1,
          ]
        );
        DB::table('area_sections')->insert([
            'id' => 2,
            'display' => 1,
            'name' => '旭川市内エリア',
            'book_label' => '旭川市内エリア',
            'reorder' => 2,
            'book_reorder' => 1,
            'book_id' => 3,
            'user_id' => 1,
          ]
        );
        DB::table('area_sections')->insert([
            'id' => 3,
            'display' => 1,
            'name' => '道北エリア',
            'book_label' => '旭川市外道北エリア',
            'reorder' => 3,
            'book_reorder' => 2,
            'book_id' => 3,
            'user_id' => 1,
          ]
        );
        DB::table('area_sections')->insert([
            'id' => 4,
            'display' => 1,
            'name' => '札幌市エリア',
            'book_label' => '札幌市エリア',
            'reorder' => 4,
            'book_reorder' => 1,
            'book_id' => 4,
            'user_id' => 1,
          ]
        );
        DB::table('area_sections')->insert([
            'id' => 5,
            'display' => 1,
            'name' => '道央エリア',
            'book_label' => '道央エリア',
            'reorder' => 5,
            'book_reorder' => 2,
            'book_id' => 4,
            'user_id' => 1,
          ]
        );
        DB::table('area_sections')->insert([
            'id' => 6,
            'display' => 1,
            'name' => '道東エリア',
            'book_label' => '道東エリア',
            'reorder' => 6,
            'book_reorder' => 1,
            'book_id' => 6,
            'user_id' => 1,
          ]
        );
        DB::table('area_sections')->insert([
            'id' => 7,
            'display' => 1,
            'name' => '道南エリア',
            'book_label' => '道南エリア',
            'reorder' => 7,
            'book_reorder' => 1,
            'book_id' => 7,
            'user_id' => 1,
          ]
        );
    }
}
