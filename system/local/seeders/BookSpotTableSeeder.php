<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class BookSpotTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    for ($i = 1; $i <= 10; $i++) {
      DB::table('book_spot')->insert([
          'book_id' => $i,
          'spot_id' => $i,
      ]);
    }
  }
}
