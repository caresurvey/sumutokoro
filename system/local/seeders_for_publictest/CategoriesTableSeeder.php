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
            'book_label' => 'その他',
            'reorder' => 999,
            'book_reorder' => 10,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 2,
            'display' => 1,
            'public' => 1,
            'serial' => 'k_yuro',
            'name' => '介護付き有料老人ホーム',
            'book_label' => '介護付<br>有料',
            'reorder' => 5,
            'book_reorder' => 5,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 3,
            'display' => 1,
            'public' => 1,
            'serial' => 'j_yuro',
            'name' => '住宅型有料老人ホーム',
            'book_label' => '住宅型<br>有料',
            'reorder' => 6,
            'book_reorder' => 6,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 4,
            'display' => 1,
            'public' => 1,
            'serial' => 'm_yuro',
            'name' => '未届け',
            'book_label' => '未届け',
            'reorder' => 800,
            'book_reorder' => 800,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 5,
            'display' => 1,
            'public' => 1,
            'serial' => 'kenko_yuro',
            'name' => '健康型有料老人ホーム',
            'book_label' => '健康型<br>有料',
            'reorder' => 9,
            'book_reorder' => 8,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 6,
            'display' => 1,
            'public' => 1,
            'serial' => 'sakoju',
            'name' => 'サービス付き高齢者住宅',
            'book_label' => 'サ高住',
            'reorder' => 7,
            'book_reorder' => 7,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 7,
            'display' => 1,
            'public' => 1,
            'serial' => 'grouphome',
            'name' => 'グループホーム',
            'book_label' => 'グループ<br>ホーム',
            'reorder' => 4,
            'book_reorder' => 4,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 8,
            'display' => 1,
            'public' => 1,
            'serial' => 'carehouse',
            'name' => 'ケアハウス（軽費老人ホーム）',
            'book_label' => 'ケアハウス',
            'reorder' => 3,
            'book_reorder' => 3,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 9,
            'display' => 1,
            'public' => 1,
            'serial' => 'apartment',
            'name' => 'シニア向け分譲・賃貸マンション、アパート',
            'book_label' => 'アパ・マン',
            'reorder' => 50,
            'book_reorder' => 1,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 10,
            'display' => 1,
            'public' => 1,
            'serial' => 'tokuyo',
            'name' => '特別養護老人ホーム',
            'book_label' => '特養',
            'reorder' => 1,
            'book_reorder' => 1,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 11,
            'display' => 1,
            'public' => 1,
            'serial' => 'rouken',
            'name' => '介護老人保健施設',
            'book_label' => '老健',
            'reorder' => 2,
            'book_reorder' => 2,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 12,
            'display' => 1,
            'public' => 1,
            'serial' => 'yougo',
            'name' => '養護老人ホーム',
            'book_label' => '養護',
            'reorder' => 10,
            'book_reorder' => 9,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 13,
            'display' => 1,
            'public' => 0,
            'serial' => 'deyservice',
            'name' => '訪問介護や訪問入浴',
            'book_label' => '訪問',
            'reorder' => 112,
            'book_reorder' => 1,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 14,
            'display' => 1,
            'public' => 0,
            'serial' => 'visited_rehabilitation',
            'name' => '訪問リハビリ',
            'book_label' => '',
            'reorder' => 113,
            'book_reorder' => 1,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 15,
            'display' => 1,
            'public' => 0,
            'serial' => 'visited_care',
            'name' => 'デイサービス（通所介護）',
            'book_label' => 'デイサービス',
            'reorder' => 114,
            'book_reorder' => 1,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 16,
            'display' => 1,
            'public' => 0,
            'serial' => 'daycare',
            'name' => 'デイケア（通所リハビリ）',
            'book_label' => 'デイケア',
            'reorder' => 115,
            'book_reorder' => 1,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 17,
            'display' => 1,
            'public' => 1,
            'serial' => 'shortstay',
            'name' => 'ショートステイ（短期入所生活介護、短期入所療養介護）',
            'book_label' => 'ショート',
            'reorder' => 116,
            'book_reorder' => 1,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 18,
            'display' => 1,
            'public' => 0,
            'serial' => 'lentall',
            'name' => '福祉用具貸与',
            'book_label' => '福祉用具',
            'reorder' => 117,
            'book_reorder' => 1,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 19,
            'display' => 1,
            'public' => 0,
            'serial' => 'caremanager',
            'name' => 'ケアマネージャー（居宅介護福祉支援事業）',
            'book_label' => 'ケアマネ',
            'reorder' => 118,
            'book_reorder' => 1,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 20,
            'display' => 1,
            'public' => 0,
            'serial' => 'smallscale',
            'name' => '小規模多機能型居宅介護',
            'book_label' => '小多機',
            'reorder' => 119,
            'book_reorder' => 1,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 21,
            'display' => 1,
            'public' => 0,
            'serial' => 'disability',
            'name' => '障がい（就労継続支援）',
            'book_label' => '障がい',
            'reorder' => 120,
            'book_reorder' => 1,
            'user_id' => 1,
          ]
        );
        DB::table('categories')->insert([
            'id' => 22,
            'display' => 1,
            'public' => 0,
            'serial' => 'disability_spot',
            'name' => '障がい（障害児通所支援・旧児童デイサービス等）',
            'book_label' => '障がい(児童)',
            'reorder' => 121,
            'book_reorder' => 1,
            'user_id' => 1,
          ]
        );

    }
}
