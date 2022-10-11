<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class SpotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            DB::table('spots')->insert([
              'id' => $i,
              'display' => 1,
              'preview' => 1,
              'name' => '事業所' . $i,
              'longname' => '事業所フルネーム' . $i,
              'zip1' => '070',
              'zip2' => '0000',
              'address' => '住所' . $i,
              'tel1' => '090',
              'tel2' => '1111',
              'tel3' => '2222',
              'vacancy' => 1,
              'document' => 1,
              'viewing' => 1,
              'is_book' => 0,
              'is_meeting' => 0,
              'heading' => '見出し' . $i,
              'message' => 'コメント' . $i,
              'monthly_price_min' => 1000,
              'monthly_price_max' => 9000,
              'for_check_monthly' => 1,
              'movein_price_min' => 10000,
              'movein_price_max' => 90000,
              'for_check_movein' => 1,
              'is_selfpay' => 1,
              'room_size' => '6畳',
              'lat' => config('myapp.default_lat'),
              'lng' => config('myapp.default_lng'),
              'search_words' => '事業所' . $i,
              'area_center_id' => 2,
              'category_id' => 2,
              'city_id' => 2,
              'company_id' => 2,
              'prefecture_id' => 2,
              'price_range_id' => 2,
              'space_id' => 2,
              'spot_plan_id' => 2,
              'trade_area_id' => 2,
              'user_id' => 1,
            ]);
        }
    }
}
