<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class AreaLabelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('area_labels')->insert([
            'id' => 1,
            'display' => 1, 
            'name' => '指定なし',
            'label' => '',
            'book_label' => '',
            'serial' => 'empty',
            'reorder' =>  1,
            'book_reorder' => 1,
            'user_id' =>  1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 2,
            'display' => 1, 
            'name' => '中央',
            'label' => '中央',
            'book_label' => '中央',
            'serial' => 'dohoku_chuo',
            'reorder' =>  1,
            'book_reorder' => 1,
            'user_id' =>  1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 3,
            'display' => 1, 
            'name' => '豊岡',
            'label' => '豊岡',
            'book_label' => '豊岡',
            'serial' => 'dohoku_toyooka',
            'reorder' => 2,
            'book_reorder' => 2,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 4,
            'display' => 1, 
            'name' => '東旭川・千代田',
            'label' => '東旭川・千代田',
            'book_label' => '東旭川・千代田',
            'serial' => 'dohoku_higashiasahikawa_chiyoda',
            'reorder' => 3,
            'book_reorder' => 3,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 5,
            'display' => 1, 
            'name' => '東光',
            'label' => '東光',
            'book_label' => '東光',
            'serial' => 'dohoku_toko',
            'reorder' =>  4,
            'book_reorder' => 4,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 6,
            'display' => 1, 
            'name' => '新旭川・永山南',
            'label' => '新旭川・永山南',
            'book_label' => '新旭川・永山南',
            'serial' => 'dohoku_shinasahikawa_nagayamaminami',
            'reorder' =>  5,
            'book_reorder' => 5,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 7,
            'display' => 1, 
            'name' => '永山',
            'label' => '永山',
            'book_label' => '永山',
            'serial' => 'dohoku_nagayama',
            'reorder' =>  6,
            'book_reorder' => 6,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 8,
            'display' => 1, 
            'name' => '末広・東鷹栖',
            'label' => '末広・東鷹栖',
            'book_label' => '末広・東鷹栖',
            'serial' => 'dohoku_suehiro_higashitakasu',
            'reorder' =>  7,
            'book_reorder' => 7,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 9,
            'display' => 1, 
            'name' => '春光・春光台',
            'label' => '春光・春光台',
            'book_label' => '春光・春光台',
            'serial' => 'dohoku_shunko_shunkodai',
            'reorder' => 9,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 10,
            'display' => 1, 
            'name' => '北星・旭星',
            'label' => '北星・旭星',
            'book_label' => '北星・旭星',
            'serial' => 'dohoku_hokusei_kyokusei',
            'reorder' => 10,
            'book_reorder' => 9,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 11,
            'display' => 1, 
            'name' => '神居・江丹別',
            'label' => '神居・江丹別',
            'book_label' => '神居・江丹別',
            'serial' => 'dohoku_kamui_etanbetsu',
            'reorder' => 11,
            'book_reorder' => 10,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 12,
            'display' => 1, 
            'name' => '神楽・西神楽',
            'label' => '神楽・西神楽',
            'book_label' => '神楽・西神楽',
            'serial' => 'dohoku_kagura_nishikagura',
            'reorder' => 12,
            'book_reorder' => 11,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 13,
            'display' => 1, 
            'name' => '道北エリア',
            'label' => '道北エリア',
            'book_label' => '道北エリア',
            'serial' => 'dohoku_dohoku_area',
            'reorder' =>  13,
            'book_reorder' => 12,
            'user_id' =>  1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 14,
            'display' => 1, 
            'name' => '中央区',
            'label' => '中央区',
            'book_label' => '中央区',
            'serial' => 'douo_chuo_district',
            'reorder' =>  14,
            'book_reorder' => 1,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 15,
            'display' => 1, 
            'name' => '北区',
            'label' => '北区',
            'book_label' => '北区',
            'serial' => 'kita_district',
            'reorder' =>  15,
            'book_reorder' => 2,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 16,
            'display' => 1, 
            'name' => '東区',
            'label' => '東区',
            'book_label' => '東区',
            'serial' => 'douo_higashi_district',
            'reorder' => 16,
            'book_reorder' => 3,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 17,
            'display' => 1, 
            'name' => '白石区',
            'label' => '白石区',
            'book_label' => '白石区',
            'serial' => 'douo_shiroishi_district',
            'reorder' => 17,
            'book_reorder' => 4,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 18,
            'display' => 1, 
            'name' => '厚別区',
            'label' => '厚別区',
            'book_label' => '厚別区',
            'serial' => 'douo_atsubetsu_district',
            'reorder' => 18,
            'book_reorder' => 5,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 19,
            'display' => 1, 
            'name' => '豊平区',
            'label' => '豊平区',
            'book_label' => '豊平区',
            'serial' => 'douo_toyohira_district',
            'reorder' => 19,
            'book_reorder' => 6,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 20,
            'display' => 1, 
            'name' => '清田区',
            'label' => '清田区',
            'book_label' => '清田区',
            'serial' => 'douo_kiyota_district',
            'reorder' => 20,
            'book_reorder' => 7,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 21,
            'display' => 1, 
            'name' => '南区',
            'label' => '南区',
            'book_label' => '南区',
            'serial' => 'douo_minami_district',
            'reorder' => 21,
            'book_reorder' => 8,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 22,
            'display' => 1, 
            'name' => '西区',
            'label' => '西区',
            'book_label' => '西区',
            'serial' => 'douo_nishi_district',
            'reorder' => 22,
            'book_reorder' => 9,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 23,
            'display' => 1, 
            'name' => '手稲区',
            'label' => '手稲区',
            'book_label' => '手稲区',
            'serial' => 'douo_teine_district',
            'reorder' => 23,
            'book_reorder' => 10,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 24,
            'display' => 1, 
            'name' => '道央エリア',
            'label' => '道央エリア',
            'book_label' => '道央エリア',
            'serial' => 'douo_douo_area',
            'reorder' => 24,
            'book_reorder' => 11,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 25,
            'display' => 1, 
            'name' => 'オホーツクエリア',
            'label' => 'オホーツクエリア',
            'book_label' => 'オホーツクエリア',
            'serial' => 'doto_ohotsuku_area',
            'reorder' => 25,
            'book_reorder' => 1,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 26,
            'display' => 1, 
            'name' => '根室・釧路エリア',
            'label' => '根室・釧路エリア',
            'book_label' => '根室・釧路エリア',
            'serial' => 'doto_nemuro_kushiro_area',
            'reorder' => 26,
            'book_reorder' => 2,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 27,
            'display' => 1, 
            'name' => '十勝・日高エリア',
            'label' => '十勝・日高エリア',
            'book_label' => '十勝・日高エリア',
            'serial' => 'doto_tokachi_hidaka_area',
            'reorder' => 27,
            'book_reorder' => 3,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 28,
            'display' => 1, 
            'name' => '胆振エリア',
            'label' => '胆振エリア',
            'book_label' => '胆振エリア',
            'serial' => 'donan_iburi_area',
            'reorder' => 27,
            'book_reorder' => 1,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 29,
            'display' => 1, 
            'name' => '後志エリア',
            'label' => '後志エリア',
            'book_label' => '後志エリア',
            'serial' => 'donan_shiribeshi_area',
            'reorder' => 29,
            'book_reorder' => 2,
            'user_id' => 1,
        ]);
        DB::table('area_labels')->insert([
            'id' => 30,
            'display' => 1, 
            'name' => '檜山・渡島エリア',
            'label' => '檜山・渡島エリア',
            'book_label' => '檜山・渡島エリア',
            'serial' => 'donan_oshima_hiyama_area',
            'reorder' => 30,
            'book_reorder' => 3,
            'user_id' => 1,
        ]);
    }
}

