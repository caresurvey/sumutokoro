<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class SpotIconItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spot_icon_items')->insert([
            'id' => 1,
            'display' => 1,
            'name' => '指定なし',
            'serial' => 'empty',
            'description' => '',
            'reorder' => 1,
            'spot_icon_genre_id' => 1,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 2,
            'display' => 1,
            'name' => '自立',
            'serial' => 'status_self',
            'description' => '',
            'reorder' => 1,
            'spot_icon_genre_id' => 2,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 3,
            'display' => 1,
            'name' => '要支援',
            'serial' => 'status_support',
            'description' => '',
            'reorder' => 2,
            'spot_icon_genre_id' => 2,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 4,
            'display' => 1,
            'name' => '要介護',
            'serial' => 'status_care',
            'description' => '',
            'reorder' => 3,
            'spot_icon_genre_id' => 2,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 5,
            'display' => 1,
            'name' => '認知症',
            'serial' => 'status_dementia',
            'description' => '',
            'reorder' => 4,
            'spot_icon_genre_id' => 2,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 6,
            'display' => 1,
            'name' => '障がい',
            'serial' => 'status_disability',
            'description' => '',
            'reorder' => 5,
            'spot_icon_genre_id' => 2,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 7,
            'display' => 1,
            'name' => '看護',
            'serial' => 'status_nursing',
            'description' => '',
            'reorder' => 6,
            'spot_icon_genre_id' => 2,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 8,
            'display' => 1,
            'name' => '感染症',
            'serial' => 'nursing_infection',
            'description' => '',
            'reorder' => 1,
            'spot_icon_genre_id' => 3,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 9,
            'display' => 1,
            'name' => 'バルーン',
            'serial' => 'nursing_baloon',
            'description' => '',
            'reorder' => 2,
            'spot_icon_genre_id' => 3,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 10,
            'display' => 1,
            'name' => '導尿',
            'serial' => 'nursing_uc',
            'description' => '',
            'reorder' => 3,
            'spot_icon_genre_id' => 3,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 11,
            'display' => 1,
            'name' => 'インスリン',
            'serial' => 'nursing_insulin',
            'description' => '',
            'reorder' => 4,
            'spot_icon_genre_id' => 3,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 12,
            'display' => 1,
            'name' => '胃ろう',
            'serial' => 'nursing_gastrostomy',
            'description' => '',
            'reorder' => 5,
            'spot_icon_genre_id' => 3,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 13,
            'display' => 1,
            'name' => '経鼻栄養',
            'serial' => 'nursing_nn',
            'description' => '',
            'reorder' => 6,
            'spot_icon_genre_id' => 3,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 14,
            'display' => 1,
            'name' => 'ストマ及びカテーテル',
            'serial' => 'nursing_stoma',
            'description' => '',
            'reorder' => 7,
            'spot_icon_genre_id' => 3,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 15,
            'display' => 1,
            'name' => '人工透析',
            'serial' => 'nursing_dialysis',
            'description' => '',
            'reorder' => 8,
            'spot_icon_genre_id' => 3,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 16,
            'display' => 1,
            'name' => 'サクション',
            'serial' => 'nursing_suction',
            'description' => '',
            'reorder' => 9,
            'spot_icon_genre_id' => 3,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 17,
            'display' => 1,
            'name' => '点滴及び注射',
            'serial' => 'nursing_injection',
            'description' => '',
            'reorder' => 10,
            'spot_icon_genre_id' => 3,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 18,
            'display' => 1,
            'name' => '中心静脈栄養（CVポート・IVH）',
            'serial' => 'nursing_ivh',
            'description' => '',
            'reorder' => 11,
            'spot_icon_genre_id' => 3,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 19,
            'display' => 1,
            'name' => '褥瘡措置・創傷',
            'serial' => 'nursing_bedsores',
            'description' => '',
            'reorder' => 12,
            'spot_icon_genre_id' => 3,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 20,
            'display' => 1,
            'name' => '在宅酸素',
            'serial' => 'nursing_home_oxygen',
            'description' => '',
            'reorder' => 13,
            'spot_icon_genre_id' => 3,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 21,
            'display' => 1,
            'name' => 'ターミナル・看取りケア',
            'serial' => 'nursing_terminal',
            'description' => '',
            'reorder' => 14,
            'spot_icon_genre_id' => 3,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 22,
            'display' => 1,
            'name' => '麻薬管理',
            'serial' => 'nursing_drag',
            'description' => '',
            'reorder' => 15,
            'spot_icon_genre_id' => 3,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 23,
            'display' => 1,
            'name' => '食事介助',
            'serial' => 'care_eatingsupport',
            'description' => '',
            'reorder' => 1,
            'spot_icon_genre_id' => 4,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 24,
            'display' => 1,
            'name' => '排泄介助',
            'serial' => 'care_excretion',
            'description' => '',
            'reorder' => 2,
            'spot_icon_genre_id' => 4,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 25,
            'display' => 1,
            'name' => '入浴介助',
            'serial' => 'care_bathingsupport',
            'description' => '',
            'reorder' => 3,
            'spot_icon_genre_id' => 4,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 26,
            'display' => 1,
            'name' => '特浴介助（機械）',
            'serial' => 'care_specialbath',
            'description' => '',
            'reorder' => 4,
            'spot_icon_genre_id' => 4,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 27,
            'display' => 1,
            'name' => '通院介助',
            'serial' => 'care_visitsupport',
            'description' => '',
            'reorder' => 5,
            'spot_icon_genre_id' => 4,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 28,
            'display' => 1,
            'name' => '個室清掃',
            'serial' => 'care_roomcleanup',
            'description' => '',
            'reorder' => 6,
            'spot_icon_genre_id' => 4,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 29,
            'display' => 1,
            'name' => '買い物代行',
            'serial' => 'care_shopping',
            'description' => '',
            'reorder' => 7,
            'spot_icon_genre_id' => 4,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 30,
            'display' => 1,
            'name' => '金銭管理',
            'serial' => 'care_money',
            'description' => '',
            'reorder' => 8,
            'spot_icon_genre_id' => 4,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 31,
            'display' => 1,
            'name' => '服薬支援',
            'serial' => 'care_medicine',
            'description' => '',
            'reorder' => 9,
            'spot_icon_genre_id' => 4,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 32,
            'display' => 1,
            'name' => '入退院時サポート',
            'serial' => 'care_hospitalsupport',
            'description' => '',
            'reorder' => 10,
            'spot_icon_genre_id' => 4,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 33,
            'display' => 1,
            'name' => 'トイレ',
            'serial' => 'privatespace_toilet',
            'description' => '',
            'reorder' => 1,
            'spot_icon_genre_id' => 5,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 34,
            'display' => 1,
            'name' => '洗面台',
            'serial' => 'privatespace_washstand',
            'description' => '',
            'reorder' => 2,
            'spot_icon_genre_id' => 5,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 35,
            'display' => 1,
            'name' => 'クローゼット',
            'serial' => 'privatespace_closet',
            'description' => '',
            'reorder' => 3,
            'spot_icon_genre_id' => 5,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 36,
            'display' => 1,
            'name' => 'キッチン',
            'serial' => 'privatespace_kitchen',
            'description' => '',
            'reorder' => 4,
            'spot_icon_genre_id' => 5,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 37,
            'display' => 1,
            'name' => 'お風呂',
            'serial' => 'privatespace_bath',
            'description' => '',
            'reorder' => 5,
            'spot_icon_genre_id' => 5,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 38,
            'display' => 1,
            'name' => 'ベッド',
            'serial' => 'privatespace_bed',
            'description' => '',
            'reorder' => 6,
            'spot_icon_genre_id' => 5,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 39,
            'display' => 1,
            'name' => 'インターネット',
            'serial' => 'privatespace_internet',
            'description' => '',
            'reorder' => 7,
            'spot_icon_genre_id' => 5,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 40,
            'display' => 1,
            'name' => '外部委託',
            'serial' => 'eating_outsourcing',
            'description' => '',
            'reorder' => 1,
            'spot_icon_genre_id' => 6,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 41,
            'display' => 1,
            'name' => '事業所内料理',
            'serial' => 'eating_within',
            'description' => '',
            'reorder' => 2,
            'spot_icon_genre_id' => 6,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 42,
            'display' => 1,
            'name' => '糖尿病',
            'serial' => 'eating_diabetes',
            'description' => '',
            'reorder' => 3,
            'spot_icon_genre_id' => 6,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 43,
            'display' => 1,
            'name' => '自炊可能',
            'serial' => 'eating_selfcatering',
            'description' => '',
            'reorder' => 4,
            'spot_icon_genre_id' => 6,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 44,
            'display' => 1,
            'name' => '透析食',
            'serial' => 'eating_dialysisfood',
            'description' => '',
            'reorder' => 5,
            'spot_icon_genre_id' => 6,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 45,
            'display' => 1,
            'name' => '健康相談',
            'serial' => 'health_consul',
            'description' => '',
            'reorder' => 1,
            'spot_icon_genre_id' => 7,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 46,
            'display' => 1,
            'name' => '健康診断',
            'serial' => 'health_diagnosis',
            'description' => '',
            'reorder' => 2,
            'spot_icon_genre_id' => 7,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 47,
            'display' => 1,
            'name' => '排便・睡眠記録',
            'serial' => 'health_recoding',
            'description' => '',
            'reorder' => 3,
            'spot_icon_genre_id' => 7,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 48,
            'display' => 1,
            'name' => ' 服薬指導',
            'serial' => 'health_medicineguide',
            'description' => '',
            'reorder' => 4,
            'spot_icon_genre_id' => 7,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 49,
            'display' => 1,
            'name' => '生活指導・栄養指導',
            'serial' => 'health_lifeguide',
            'description' => '',
            'reorder' => 5,
            'spot_icon_genre_id' => 7,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 50,
            'display' => 1,
            'name' => 'おやつ',
            'serial' => 'life_snack',
            'description' => '',
            'reorder' => 1,
            'spot_icon_genre_id' => 8,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 51,
            'display' => 1,
            'name' => '寝具交換',
            'serial' => 'life_bedmake',
            'description' => '',
            'reorder' => 2,
            'spot_icon_genre_id' => 8,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 52,
            'display' => 1,
            'name' => '居室内清掃',
            'serial' => 'life_cleanup',
            'description' => '',
            'reorder' => 3,
            'spot_icon_genre_id' => 8,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 53,
            'display' => 1,
            'name' => '役所手続き代行',
            'serial' => 'life_government',
            'description' => '',
            'reorder' => 4,
            'spot_icon_genre_id' => 8,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 54,
            'display' => 1,
            'name' => '日常の洗濯',
            'serial' => 'life_wash',
            'description' => '',
            'reorder' => 5,
            'spot_icon_genre_id' => 8,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 55,
            'display' => 1,
            'name' => '理美容サービス',
            'serial' => 'life_salon',
            'description' => '',
            'reorder' => 6,
            'spot_icon_genre_id' => 8,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 56,
            'display' => 1,
            'name' => '買い物代行',
            'serial' => 'life_buy',
            'description' => '',
            'reorder' => 7,
            'spot_icon_genre_id' => 8,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 57,
            'display' => 1,
            'name' => '金銭・貯金管理',
            'serial' => 'life_money',
            'description' => '',
            'reorder' => 8,
            'spot_icon_genre_id' => 8,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 58,
            'display' => 1,
            'name' => '入退院同行',
            'serial' => 'hospitalization_accompany',
            'description' => '',
            'reorder' => 1,
            'spot_icon_genre_id' => 9,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 59,
            'display' => 1,
            'name' => '入院御見舞',
            'serial' => 'hospitalization_greeting',
            'description' => '',
            'reorder' => 2,
            'spot_icon_genre_id' => 9,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 60,
            'display' => 1,
            'name' => '入院中買い物',
            'serial' => 'hospitalization_shopping',
            'description' => '',
            'reorder' => 3,
            'spot_icon_genre_id' => 9,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 61,
            'display' => 1,
            'name' => '送迎サービス',
            'serial' => 'hospitalization_transport',
            'description' => '',
            'reorder' => 4,
            'spot_icon_genre_id' => 9,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 62,
            'display' => 1,
            'name' => '生活保護',
            'serial' => 'other_hogo',
            'description' => '',
            'reorder' => 1,
            'spot_icon_genre_id' => 10,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 63,
            'display' => 1,
            'name' => 'ペット可',
            'serial' => 'other_pet',
            'description' => '',
            'reorder' => 2,
            'spot_icon_genre_id' => 10,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 64,
            'display' => 1,
            'name' => '年齢制限',
            'serial' => 'other_age',
            'description' => '',
            'reorder' => 3,
            'spot_icon_genre_id' => 10,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 65,
            'display' => 1,
            'name' => '夫婦入居',
            'serial' => 'other_pare',
            'description' => '',
            'reorder' => 4,
            'spot_icon_genre_id' => 10,
            'user_id' =>  1,
        ]);
        DB::table('spot_icon_items')->insert([
            'id' => 66,
            'display' => 1,
            'name' => '体験入居',
            'serial' => 'other_trial',
            'description' => '',
            'reorder' => 5,
            'spot_icon_genre_id' => 10,
            'user_id' =>  1,
        ]);
    }
}

