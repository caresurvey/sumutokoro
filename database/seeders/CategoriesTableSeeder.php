<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'display' => 1,
            'public' => 1,
            'serial' => 'other',
            'name' => 'その他',
            'reorder' => 999,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 2,
            'display' => 1,
            'public' => 1,
            'serial' => 'k_yuro',
            'name' => '介護付き有料老人ホーム',
            'reorder' => 5,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 3,
            'display' => 1,
            'public' => 1,
            'serial' => 'j_yuro',
            'name' => '住宅型有料老人ホーム',
            'reorder' => 6,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 4,
            'display' => 1,
            'public' => 1,
            'serial' => 'm_yuro',
            'name' => '未届け',
            'reorder' => 800,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 5,
            'display' => 1,
            'public' => 1,
            'serial' => 'k_yuro',
            'name' => '健康型有料老人ホーム',
            'reorder' => 9,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 6,
            'display' => 1,
            'public' => 1,
            'serial' => 'sakoju',
            'name' => 'サービス付き高齢者住宅',
            'reorder' => 7,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 7,
            'display' => 1,
            'public' => 1,
            'serial' => 'grouphome',
            'name' => 'グループホーム',
            'reorder' => 4,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 8,
            'display' => 1,
            'public' => 1,
            'serial' => 'carehouse',
            'name' => 'ケアハウス（軽費老人ホーム）',
            'reorder' => 3,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 9,
            'display' => 1,
            'public' => 1,
            'serial' => 'apartment',
            'name' => 'シニア向け分譲・賃貸マンション、アパート',
            'reorder' => 50,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 10,
            'display' => 1,
            'public' => 1,
            'serial' => 'tokuyo',
            'name' => '特別養護老人ホーム',
            'reorder' => 1,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 11,
            'display' => 1,
            'public' => 1,
            'serial' => 'rouken',
            'name' => '介護老人保健施設',
            'reorder' => 2,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 12,
            'display' => 1,
            'public' => 1,
            'serial' => 'yourou',
            'name' => '養護老人ホーム',
            'reorder' => 10,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 13,
            'display' => 1,
            'public' => 0,
            'serial' => 'deyservice',
            'name' => '訪問介護や訪問入浴',
            'reorder' => 112,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 14,
            'display' => 1,
            'public' => 0,
            'serial' => 'visited_rehabilitation',
            'name' => '訪問リハビリ',
            'reorder' => 113,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 15,
            'display' => 1,
            'public' => 0,
            'serial' => 'visited_care',
            'name' => 'デイサービス（通所介護）',
            'reorder' => 114,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 16,
            'display' => 1,
            'public' => 0,
            'serial' => 'daycare',
            'name' => 'デイケア（通所リハビリ）',
            'reorder' => 115,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 17,
            'display' => 1,
            'public' => 1,
            'serial' => 'shortstay',
            'name' => 'ショートステイ（短期入所生活介護、短期入所療養介護）',
            'reorder' => 116,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 18,
            'display' => 1,
            'public' => 0,
            'serial' => 'lentall',
            'name' => '福祉用具貸与',
            'reorder' => 117,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 19,
            'display' => 1,
            'public' => 0,
            'serial' => 'caremanager',
            'name' => 'ケアマネージャー（居宅介護福祉支援事業）',
            'reorder' => 118,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 20,
            'display' => 1,
            'public' => 0,
            'serial' => 'smallscale',
            'name' => '小規模多機能型居宅介護',
            'reorder' => 119,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 21,
            'display' => 1,
            'public' => 0,
            'serial' => 'disability',
            'name' => '障がい（就労継続支援）',
            'reorder' => 120,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 22,
            'display' => 1,
            'public' => 0,
            'serial' => 'disability_spot',
            'name' => '障がい（障害児通所支援・旧児童デイサービス等）',
            'reorder' => 121,
            'user_id' => 1,
          ]
        );

    }
}
