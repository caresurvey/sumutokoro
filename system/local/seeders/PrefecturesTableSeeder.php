<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class PrefecturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prefectures')->insert([
            'id' => 1,
            'display' => 1,
            'public' => 0,
            'serial' => 'empty',
            'code' => '00',
            'name' => '指定なし',
            'lat' => 43.287247529228715,
            'lng' => 142.67940204709708,
            'zoom' => 9,
            'reorder' => 1,
            'user_id' => 1,
          ]
        );
        DB::table('prefectures')->insert([
            'id' => 2,
            'display' => 1,
            'public' => 1,
            'serial' => 'hokkaido',
            'code' => '01',
            'name' => '北海道',
            'lat' => 43.287247529228715,
            'lng' => 142.67940204709708,
            'zoom' => 7,
            'reorder' => 2,
            'user_id' => 1,
          ]
        );
        DB::table('prefectures')->insert([
            'id' => 3,
            'display' => 1,
            'public' => 1,
            'serial' => 'aomori',
            'code' => '02',
            'name' => '青森県',
            'lat' => 40.68786062490928,
            'lng' => 140.73868817096948,
            'zoom' => 9,
            'reorder' => 3,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 4,
            'display' => 1,
            'public' => 1,
            'serial' => 'iwate',
            'code' => '03',
            'name' => '岩手県',
            'lat' => 39.70491591343983,
            'lng' => 141.14620780275695,
            'zoom' => 10,
            'reorder' => 4,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 5,
            'display' => 1,
            'public' => 1,
            'serial' => 'miyagi',
            'code' => '04',
            'name' => '宮城県',
            'lat' => 38.43355057040772,
            'lng' => 140.84204179874368,
            'zoom' => 8,
            'reorder' => 5,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 6,
            'display' => 1,
            'public' => 1,
            'serial' => 'akita',
            'code' => '05',
            'name' => '秋田県',
            'lat' => 39.799282940620294,
            'lng' => 140.20724159989427,
            'zoom' => 9,
            'reorder' => 6,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 7,
            'display' => 1,
            'public' => 1,
            'serial' => 'yamagata',
            'code' => '06',
            'name' => '山形県',
            'lat' => 38.514108545459486,
            'lng' => 140.11069635366258,
            'zoom' => 8,
            'reorder' => 7,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 8,
            'display' => 1,
            'public' => 1,
            'serial' => 'fukushima',
            'code' => '07',
            'name' => '福島県',
            'lat' => 37.54758437103172,
            'lng' => 140.35356802420682,
            'zoom' => 10,
            'reorder' => 8,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 9,
            'display' => 1,
            'public' => 1,
            'serial' => 'ibaraki',
            'code' => '08',
            'name' => '茨城県',
            'lat' => 36.339933608546005,
            'lng' => 140.373687646229,
            'zoom' => 8,
            'reorder' => 9,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 10,
            'display' => 1,
            'public' => 1,
            'serial' => 'tochigi',
            'code' => '09',
            'name' => '栃木県',
            'lat' => 36.676228297215616,
            'lng' => 139.82415211186952,
            'zoom' => 9,
            'reorder' => 10,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 11,
            'display' => 1,
            'public' => 1,
            'serial' => 'gunma',
            'code' => '10',
            'name' => '群馬県',
            'lat' => 36.555322958115475,
            'lng' => 138.9599739695398,
            'zoom' => 9,
            'reorder' => 11,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 12,
            'display' => 1,
            'public' => 1,
            'serial' => 'saitama',
            'code' => '11',
            'name' => '埼玉県',
            'lat' => 36.01300986087846,
            'lng' => 139.36445892256148,
            'zoom' => 9,
            'reorder' => 12,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 13,
            'display' => 1,
            'public' => 1,
            'serial' => 'chiba',
            'code' => '12',
            'name' => '千葉県',
            'lat' => 35.353134169019015,
            'lng' => 140.17066516468896,
            'zoom' => 9,
            'reorder' => 13,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 14,
            'display' => 1,
            'public' => 1,
            'serial' => 'tokyo',
            'code' => '13',
            'name' => '東京都',
            'lat' => 35.70104953079098,
            'lng' => 139.7114390513546,
            'zoom' => 12,
            'reorder' => 14,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 15,
            'display' => 1,
            'public' => 1,
            'serial' => 'kanagawa',
            'code' => '14',
            'name' => '神奈川県',
            'lat' => 35.44899460135254,
            'lng' => 139.6387572266581,
            'zoom' => 11,
            'reorder' => 15,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 16,
            'display' => 1,
            'public' => 1,
            'serial' => 'niigata',
            'code' => '15',
            'name' => '新潟県',
            'lat' => 37.676652944391,
            'lng' => 139.1647825600832,
            'zoom' => 9,
            'reorder' => 16,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 17,
            'display' => 1,
            'public' => 1,
            'serial' => 'toyama',
            'code' => '16',
            'name' => '富山県',
            'lat' => 36.735008386143264,
            'lng' => 137.07766868141888,
            'zoom' => 11,
            'reorder' => 17,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 18,
            'display' => 1,
            'public' => 1,
            'serial' => 'ishikawa',
            'code' => '17',
            'name' => '石川県',
            'lat' => 36.41282058493533,
            'lng' => 136.60238331148773,
            'zoom' => 9,
            'reorder' => 18,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 19,
            'display' => 1,
            'public' => 1,
            'serial' => 'fukui',
            'code' => '18',
            'name' => '福井県',
            'lat' => 35.95510142511548,
            'lng' => 136.40040212049655,
            'zoom' => 9,
            'reorder' => 19,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 20,
            'display' => 1,
            'public' => 1,
            'serial' => 'yamanashi',
            'code' => '19',
            'name' => '山梨県',
            'lat' => 35.610182415983125,
            'lng' => 138.62336927385925,
            'zoom' => 9,
            'reorder' => 20,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 21,
            'display' => 1,
            'public' => 1,
            'serial' => 'nagano',
            'code' => '20',
            'name' => '長野県',
            'lat' => 36.202330267165614,
            'lng' => 138.15473236083858,
            'zoom' => 9,
            'reorder' => 21,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 22,
            'display' => 1,
            'public' => 1,
            'serial' => 'gifu',
            'code' => '21',
            'name' => '岐阜県',
            'lat' => 35.838455840954694,
            'lng' => 137.06749472263058,
            'zoom' => 9,
            'reorder' => 22,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 23,
            'display' => 1,
            'public' => 1,
            'serial' => 'shizuoka',
            'code' => '22',
            'name' => '静岡県',
            'lat' => 34.792888268298434,
            'lng' => 138.03861134632245,
            'reorder' => 11,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 24,
            'display' => 1,
            'public' => 1,
            'serial' => 'aichi',
            'code' => '23',
            'name' => '愛知県',
            'lat' => 35.06901500321669,
            'lng' => 137.1981560340956,
            'zoom' => 9,
            'reorder' => 24,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 25,
            'display' => 1,
            'public' => 1,
            'serial' => 'mie',
            'code' => '24',
            'name' => '三重県',
            'lat' => 34.40591315305999,
            'lng' => 136.40040209690773,
            'zoom' => 9,
            'reorder' => 25,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 26,
            'display' => 1,
            'public' => 1,
            'serial' => 'shiga',
            'code' => '25',
            'name' => '滋賀県',
            'lat' => 35.27745529525902,
            'lng' => 136.0912341617668,
            'zoom' => 9,
            'reorder' => 26,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 27,
            'display' => 1,
            'public' => 1,
            'serial' => 'kyoto',
            'code' => '26',
            'name' => '京都府',
            'lat' => 35.091043188707204,
            'lng' => 135.69818803469371,
            'zoom' => 9,
            'reorder' => 27,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 28,
            'display' => 1,
            'public' => 1,
            'serial' => 'osaka',
            'code' => '27',
            'name' => '大阪府',
            'lat' => 34.69132219768696,
            'lng' => 135.47728056104697,
            'reorder' => 11,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 29,
            'display' => 1,
            'public' => 1,
            'serial' => 'hyogo',
            'code' => '28',
            'name' => '兵庫県',
            'lat' => 34.98511648452726,
            'lng' => 135.071533667898,
            'zoom' => 9,
            'reorder' => 29,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 30,
            'display' => 1,
            'public' => 1,
            'serial' => 'nara',
            'code' => '29',
            'name' => '奈良県',
            'lat' => 34.78136023511518,
            'lng' =>  135.73156150443336,
            'zoom' => 9,
            'reorder' => 30,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 31,
            'display' => 1,
            'public' => 1,
            'serial' => 'wakayama',
            'code' => '30',
            'name' => '和歌山県',
            'lat' => 33.873128907487526,
            'lng' => 135.49691093047883,
            'zoom' => 9,
            'reorder' => 31,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 32,
            'display' => 1,
            'public' => 1,
            'serial' => 'tottori',
            'code' => '31',
            'name' => '鳥取県',
            'lat' => 35.465271264950395,
            'lng' => 133.84327264449794,
            'zoom' => 9,
            'reorder' => 32,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 33,
            'display' => 1,
            'public' => 1,
            'serial' => 'shimane',
            'code' => '32',
            'name' => '島根県',
            'lat' => 35.21296209687891,
            'lng' => 132.78415316505465,
            'zoom' => 9,
            'reorder' => 33,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 34,
            'display' => 1,
            'public' => 1,
            'serial' => 'okayama',
            'code' => '33',
            'name' => '岡山県',
            'lat' => 35.0218074015807,
            'lng' => 133.83020045490284,
            'zoom' => 9,
            'reorder' => 34,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 35,
            'display' => 1,
            'public' => 1,
            'serial' => 'hiroshima',
            'code' => '34',
            'name' => '広島県',
            'lat' => 34.564763951168125,
            'lng' => 132.8098632358775,
            'zoom' => 9,
            'reorder' => 35,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 36,
            'display' => 1,
            'public' => 1,
            'serial' => 'yamaguchi',
            'code' => '35',
            'name' => '山口県',
            'lat' => 34.249763217488095,
            'lng' => 131.42985860721575,
            'zoom' => 9,
            'reorder' => 36,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 37,
            'display' => 1,
            'public' => 1,
            'serial' => 'tokushima',
            'code' => '36',
            'name' => '徳島県',
            'lat' => 33.92901310628072,
            'lng' => 134.2830167305994,
            'zoom' => 9,
            'reorder' => 37,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 38,
            'display' => 1,
            'public' => 1,
            'serial' => 'kagawa',
            'code' => '37',
            'name' => '香川県',
            'lat' => 34.22128195629858,
            'lng' => 134.02552932219177,
            'zoom' => 9,
            'reorder' => 38,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 39,
            'display' => 1,
            'public' => 1,
            'serial' => 'ehime',
            'code' => '38',
            'name' => '愛媛県',
            'lat' => 33.70716749504121,
            'lng' => 132.8239214162895,
            'zoom' => 9,
            'reorder' => 39,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 40,
            'display' => 1,
            'public' => 1,
            'serial' => 'kouchi',
            'code' => '39',
            'name' => '高知県',
            'lat' => 33.44496919279391,
            'lng' => 133.23399395560534,
            'zoom' => 9,
            'reorder' => 40,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 41,
            'display' => 1,
            'public' => 1,
            'serial' => 'fukuoka',
            'code' => '40',
            'name' => '福岡県',
            'lat' => 33.531091699938145,
            'lng' => 130.7249203019283,
            'zoom' => 9,
            'reorder' => 41,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 42,
            'display' => 1,
            'public' => 1,
            'serial' => 'saga',
            'code' => '41',
            'name' => '佐賀県',
            'lat' => 33.28365677198669,
            'lng' => 130.06061179588292,
            'zoom' => 9,
            'reorder' => 42,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 43,
            'display' => 1,
            'public' => 1,
            'serial' => 'nagasaki',
            'code' => '42',
            'name' => '長崎県',
            'lat' => 33.27488746732964,
            'lng' => 129.66721931315908,
            'zoom' => 9,
            'reorder' => 43,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 44,
            'display' => 1,
            'public' => 1,
            'serial' => 'kumamoto',
            'code' => '43',
            'name' => '熊本県',
            'lat' => 32.58652975097171,
            'lng' => 130.80419866819867,
            'zoom' => 9,
            'reorder' => 44,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 45,
            'display' => 1,
            'public' => 1,
            'serial' => 'ooita',
            'code' => '44',
            'name' => '大分県',
            'lat' => 33.18299558967813,
            'lng' => 131.5594368828436,
            'zoom' => 9,
            'reorder' => 45,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 46,
            'display' => 1,
            'public' => 1,
            'serial' => 'miyazaki',
            'code' => '45',
            'name' => '宮崎県',
            'lat' => 32.42730172289055,
            'lng' => 131.36163639805565,
            'zoom' => 9,
            'reorder' => 46,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 47,
            'display' => 1,
            'public' => 1,
            'serial' => 'kagoshima',
            'code' => '46',
            'name' => '鹿児島県',
            'lat' => 31.902145113437925,
            'lng' => 130.44456142312967,
            'zoom' => 9,
            'reorder' => 47,
            'user_id' => 1,
          ]

        );
        DB::table('prefectures')->insert([
            'id' => 48,
            'display' => 1,
            'public' => 1,
            'serial' => 'okinawa',
            'code' => '47',
            'name' => '沖縄県',
            'lat' => 26.511995131861173,
            'lng' => 127.94451592426236,
            'zoom' => 9,
            'reorder' => 48,
            'user_id' => 1,
          ]
        );
    }
}
