<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class CategoryCompanyTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    for ($i = 1; $i <= 10; $i++) {
      DB::table('category_company')->insert([
          'category_id' => $i,
          'company_id' => $i,
      ]);
    }
  }
}
