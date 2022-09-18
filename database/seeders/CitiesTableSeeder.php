<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'id' => 1,
            'display' => 0, 
            'public' => 0,
            'serial' => 'empty',
            'code' => '000',
            'name' => '指定なし',
            'label' => '',
            'reorder' => 1,
        ]);
        DB::table('cities')->insert([
            'id' => 2,
            'display' => 1,
            'public' => 1,
            'serial' => 'sapporo', 
            'code' => '101', 
            'name' => '札幌市',
            'label' => '札幌市',
            'reorder' => 2,
        ]);
        DB::table('cities')->insert([
            'id' => 3,
            'display' => 1,
            'public' => 1,
            'serial' => 'hakodate', 
            'code' => '202', 
            'name' => '函館市',
            'label' => '函館市',
            'reorder' => 3,
        ]);
        DB::table('cities')->insert([
            'id' => 4,
            'display' => 1,
            'public' => 1,
            'serial' => 'otaru', 
            'code' => '203', 
            'name' => '小樽市',
            'label' => '小樽市',
            'reorder' => 4,
        ]);
        DB::table('cities')->insert([
            'id' => 5,
            'display' => 1,
            'public' => 1,
            'serial' => 'asahikawa', 
            'code' => '204', 
            'name' => '旭川市',
            'label' => '旭川市',
            'reorder' => 5,
        ]);
        DB::table('cities')->insert([
            'id' => 6,
            'display' => 1,
            'public' => 1,
            'serial' => 'muroran', 
            'code' => '205', 
            'name' => '室蘭市',
            'label' => '室蘭市',
            'reorder' => 6,
        ]);
        DB::table('cities')->insert([
            'id' => 7,
            'display' => 1,
            'public' => 1,
            'serial' => 'kushiro', 
            'code' => '206', 
            'name' => '釧路市',
            'label' => '釧路市',
            'reorder' => 7,
        ]);
        DB::table('cities')->insert([
            'id' => 8,
            'display' => 1,
            'public' => 1,
            'serial' => 'obihiro', 
            'code' => '207', 
            'name' => '帯広市',
            'label' => '帯広市',
            'reorder' => 8,
        ]);
        DB::table('cities')->insert([
            'id' => 9,
            'display' => 1,
            'public' => 1,
            'serial' => 'kitami', 
            'code' => '208', 
            'name' => '北見市',
            'label' => '北見市',
            'reorder' => 9,
        ]);
        DB::table('cities')->insert([
            'id' => 10,
            'display' => 1,
            'public' => 1,
            'serial' => 'yubari', 
            'code' => '209', 
            'name' => '夕張市',
            'label' => '夕張市',
            'reorder' => 10,
        ]);
        DB::table('cities')->insert([
            'id' => 11,
            'display' => 1,
            'public' => 1,
            'serial' => 'iwamizawa', 
            'code' => '210', 
            'name' => '岩見沢市',
            'label' => '岩見沢市',
            'reorder' => 11,
        ]);
        DB::table('cities')->insert([
            'id' => 12,
            'display' => 1,
            'public' => 1,
            'serial' => 'abashiri', 
            'code' => '211', 
            'name' => '網走市',
            'label' => '網走市',
            'reorder' => 12,
        ]);
        DB::table('cities')->insert([
            'id' => 13,
            'display' => 1,
            'public' => 1,
            'serial' => 'rumoi', 
            'code' => '212', 
            'name' => '留萌市',
            'label' => '留萌市',
            'reorder' => 13,
        ]);
        DB::table('cities')->insert([
            'id' => 14,
            'display' => 1,
            'public' => 1,
            'serial' => 'tomakomai', 
            'code' => '213', 
            'name' => '苫小牧市',
            'label' => '苫小牧市',
            'reorder' => 14,
        ]);
        DB::table('cities')->insert([
            'id' => 15,
            'display' => 1,
            'public' => 1,
            'serial' => 'wakkanai', 
            'code' => '214', 
            'name' => '稚内市',
            'label' => '稚内市',
            'reorder' => 15,
        ]);
        DB::table('cities')->insert([
            'id' => 16,
            'display' => 1,
            'public' => 1,
            'serial' => 'bibai', 
            'code' => '215', 
            'name' => '美唄市',
            'label' => '美唄市',
            'reorder' => 16,
        ]);
        DB::table('cities')->insert([
            'id' => 17,
            'display' => 1,
            'public' => 1,
            'serial' => 'ashibetsu', 
            'code' => '216', 
            'name' => '芦別市',
            'label' => '芦別市',
            'reorder' => 17,
        ]);
        DB::table('cities')->insert([
            'id' => 18,
            'display' => 1,
            'public' => 1,
            'serial' => 'ebetsu', 
            'code' => '217', 
            'name' => '江別市',
            'label' => '江別市',
            'reorder' => 18,
        ]);
        DB::table('cities')->insert([
            'id' => 19,
            'display' => 1,
            'public' => 1,
            'serial' => 'akabira', 
            'code' => '218', 
            'name' => '赤平市',
            'label' => '赤平市',
            'reorder' => 19,
        ]);
        DB::table('cities')->insert([
            'id' => 20,
            'display' => 1,
            'public' => 1,
            'serial' => 'monbetsu', 
            'code' => '219', 
            'name' => '紋別市',
            'label' => '紋別市',
            'reorder' => 20,
        ]);
        DB::table('cities')->insert([
            'id' => 21,
            'display' => 1,
            'public' => 1,
            'serial' => 'shibetsu', 
            'code' => '220', 
            'name' => '士別市',
            'label' => '士別市',
            'reorder' => 21,
        ]);
        DB::table('cities')->insert([
            'id' => 22,
            'display' => 1,
            'public' => 1,
            'serial' => 'nayoro', 
            'code' => '221', 
            'name' => '名寄市',
            'label' => '名寄市',
            'reorder' => 22,
        ]);
        DB::table('cities')->insert([
            'id' => 23,
            'display' => 1,
            'public' => 1,
            'serial' => 'mikasa', 
            'code' => '222', 
            'name' => '三笠市',
            'label' => '三笠市',
            'reorder' => 23,
        ]);
        DB::table('cities')->insert([
            'id' => 24,
            'display' => 1,
            'public' => 1,
            'serial' => 'nemuro', 
            'code' => '223', 
            'name' => '根室市',
            'label' => '根室市',
            'reorder' => 24,
        ]);
        DB::table('cities')->insert([
            'id' => 25,
            'display' => 1,
            'public' => 1,
            'serial' => 'chitose', 
            'code' => '224', 
            'name' => '千歳市',
            'label' => '千歳市',
            'reorder' => 25,
        ]);
        DB::table('cities')->insert([
            'id' => 26,
            'display' => 1,
            'public' => 1,
            'serial' => 'takikawa', 
            'code' => '225', 
            'name' => '滝川市',
            'label' => '滝川市',
            'reorder' => 26,
        ]);
        DB::table('cities')->insert([
            'id' => 27,
            'display' => 1,
            'public' => 1,
            'serial' => 'sunagawa', 
            'code' => '226', 
            'name' => '砂川市',
            'label' => '砂川市',
            'reorder' => 27,
        ]);
        DB::table('cities')->insert([
            'id' => 28,
            'display' => 1,
            'public' => 1,
            'serial' => 'utashinai', 
            'code' => '227', 
            'name' => '歌志内市',
            'label' => '歌志内市',
            'reorder' => 28,
        ]);
        DB::table('cities')->insert([
            'id' => 29,
            'display' => 1,
            'public' => 1,
            'serial' => 'fukagawa', 
            'code' => '228', 
            'name' => '深川市',
            'label' => '深川市',
            'reorder' => 29,
        ]);
        DB::table('cities')->insert([
            'id' => 30,
            'display' => 1,
            'public' => 1,
            'serial' => 'furano', 
            'code' => '229', 
            'name' => '富良野市',
            'label' => '富良野市',
            'reorder' => 30,
        ]);
        DB::table('cities')->insert([
            'id' => 31,
            'display' => 1,
            'public' => 1,
            'serial' => 'noboribetsu', 
            'code' => '230', 
            'name' => '登別市',
            'label' => '登別市',
            'reorder' => 31,
        ]);
        DB::table('cities')->insert([
            'id' => 32,
            'display' => 1,
            'public' => 1,
            'serial' => 'eniwa', 
            'code' => '231', 
            'name' => '恵庭市',
            'label' => '恵庭市',
            'reorder' => 32,
        ]);
        DB::table('cities')->insert([
            'id' => 33,
            'display' => 1,
            'public' => 1,
            'serial' => 'date', 
            'code' => '233', 
            'name' => '伊達市',
            'label' => '伊達市',
            'reorder' => 33,
        ]);
        DB::table('cities')->insert([
            'id' => 34,
            'display' => 1,
            'public' => 1,
            'serial' => 'kitahiroshima', 
            'code' => '234', 
            'name' => '北広島市',
            'label' => '北広島市',
            'reorder' => 34,
        ]);
        DB::table('cities')->insert([
            'id' => 35,
            'display' => 1,
            'public' => 1,
            'serial' => 'ishikari', 
            'code' => '235', 
            'name' => '石狩市',
            'label' => '石狩市',
            'reorder' => 35,
        ]);
        DB::table('cities')->insert([
            'id' => 36,
            'display' => 1,
            'public' => 1,
            'serial' => 'hokuto', 
            'code' => '236', 
            'name' => '北斗市',
            'label' => '北斗市',
            'reorder' => 36,
        ]);
        DB::table('cities')->insert([
            'id' => 37,
            'display' => 1,
            'public' => 1,
            'serial' => 'toubetsu', 
            'code' => '303', 
            'name' => '石狩郡当別町',
            'label' => '当別町',
            'reorder' => 37,
        ]);
        DB::table('cities')->insert([
            'id' => 38,
            'display' => 1,
            'public' => 1,
            'serial' => 'shinshinotsu', 
            'code' => '304', 
            'name' => '石狩郡新篠津村',
            'label' => '新篠津村',
            'reorder' => 38,
        ]);
        DB::table('cities')->insert([
            'id' => 39,
            'display' => 1,
            'public' => 1,
            'serial' => 'matsumae', 
            'code' => '331', 
            'name' => '松前郡松前町',
            'label' => '松前町',
            'reorder' => 39,
        ]);
        DB::table('cities')->insert([
            'id' => 40,
            'display' => 1,
            'public' => 1,
            'serial' => 'fukushima', 
            'code' => '332', 
            'name' => '松前郡福島町',
            'label' => '福島町',
            'reorder' => 40,
        ]);
        DB::table('cities')->insert([
            'id' => 41,
            'display' => 1,
            'public' => 1,
            'serial' => 'shiruuchi', 
            'code' => '333', 
            'name' => '上磯郡知内町',
            'label' => '知内町',
            'reorder' => 41,
        ]);
        DB::table('cities')->insert([
            'id' => 42,
            'display' => 1,
            'public' => 1,
            'serial' => 'kikonai', 
            'code' => '334', 
            'name' => '上磯郡木古内町',
            'label' => '木古内町',
            'reorder' => 42,
        ]);
        DB::table('cities')->insert([
            'id' => 43,
            'display' => 1,
            'public' => 1,
            'serial' => 'nanae', 
            'code' => '337', 
            'name' => '亀田郡七飯町',
            'label' => '七飯町',
            'reorder' => 43,
        ]);
        DB::table('cities')->insert([
            'id' => 44,
            'display' => 1,
            'public' => 1,
            'serial' => 'shikabe', 
            'code' => '343', 
            'name' => '茅部郡鹿部町',
            'label' => '鹿部町',
            'reorder' => 44,
        ]);
        DB::table('cities')->insert([
            'id' => 45,
            'display' => 1,
            'public' => 1,
            'serial' => 'mori', 
            'code' => '345', 
            'name' => '茅部郡森町',
            'label' => '森町',
            'reorder' => 45,
        ]);
        DB::table('cities')->insert([
            'id' => 46,
            'display' => 1,
            'public' => 1,
            'serial' => 'yakumo', 
            'code' => '346', 
            'name' => '二海郡八雲町',
            'label' => '八雲町',
            'reorder' => 46,
        ]);
        DB::table('cities')->insert([
            'id' => 47,
            'display' => 1,
            'public' => 1,
            'serial' => 'osyamanbe', 
            'code' => '347', 
            'name' => '山越郡長万部町',
            'label' => '長万部町',
            'reorder' => 47,
        ]);
        DB::table('cities')->insert([
            'id' => 48,
            'display' => 1,
            'public' => 1,
            'serial' => 'esashi_h', 
            'code' => '361', 
            'name' => '檜山郡江差町',
            'label' => '江差町',
            'reorder' => 48,
        ]);
        DB::table('cities')->insert([
            'id' => 49,
            'display' => 1,
            'public' => 1,
            'serial' => 'kaminokuni', 
            'code' => '362', 
            'name' => '檜山郡上ノ国町',
            'label' => '上ノ国町',
            'reorder' => 49,
        ]);
        DB::table('cities')->insert([
            'id' => 50,
            'display' => 1,
            'public' => 1,
            'serial' => 'assabu', 
            'code' => '363', 
            'name' => '檜山郡厚沢部町',
            'label' => '厚沢部町',
            'reorder' => 50,
        ]);
        DB::table('cities')->insert([
            'id' => 51,
            'display' => 1,
            'public' => 1,
            'serial' => 'otobe', 
            'code' => '364', 
            'name' => '爾志郡乙部町',
            'label' => '乙部町',
            'reorder' => 51,
        ]);
        DB::table('cities')->insert([
            'id' => 52,
            'display' => 1,
            'public' => 1,
            'serial' => 'okushiri', 
            'code' => '367', 
            'name' => '奥尻郡奥尻町',
            'label' => '奥尻町',
            'reorder' => 52,
        ]);
        DB::table('cities')->insert([
            'id' => 53,
            'display' => 1,
            'public' => 1,
            'serial' => 'imagane', 
            'code' => '370',
            'name' => '瀬棚郡今金町',
            'label' => '今金町',
            'reorder' => 53,
        ]);
        DB::table('cities')->insert([
            'id' => 54,
            'display' => 1,
            'public' => 1,
            'serial' => 'setana', 
            'code' => '371', 
            'name' => '久遠郡せたな町',
            'label' => 'せたな町',
            'reorder' => 54,
        ]);
        DB::table('cities')->insert([
            'id' => 55,
            'display' => 1,
            'public' => 1,
            'serial' => 'shimamaki', 
            'code' => '391', 
            'name' => '島牧郡島牧村',
            'label' => '島牧村',
            'reorder' => 55,
        ]);
        DB::table('cities')->insert([
            'id' => 56,
            'display' => 1,
            'public' => 1,
            'serial' => 'suttsu', 
            'code' => '392', 
            'name' => '寿都郡寿都町',
            'label' => '寿都町',
            'reorder' => 56,
        ]);
        DB::table('cities')->insert([
            'id' => 57,
            'display' => 1,
            'public' => 1,
            'serial' => 'kuromatsunai', 
            'code' => '393', 
            'name' => '寿都郡黒松内町',
            'label' => '黒松内町',
            'reorder' => 57,
        ]);
        DB::table('cities')->insert([
            'id' => 58,
            'display' => 1,
            'public' => 1,
            'serial' => 'rankoshi', 
            'code' => '394', 
            'name' => '磯谷郡蘭越町',
            'label' => '蘭越町',
            'reorder' => 58,
        ]);
        DB::table('cities')->insert([
            'id' => 59,
            'display' => 1,
            'public' => 1,
            'serial' => 'niseko', 
            'code' => '395', 
            'name' => '虻田郡ニセコ町',
            'label' => 'ニセコ町',
            'reorder' => 59,
        ]);
        DB::table('cities')->insert([
            'id' => 60,
            'display' => 1,
            'public' => 1,
            'serial' => 'makkari', 
            'code' => '396', 
            'name' => '虻田郡真狩村',
            'label' => '真狩村',
            'reorder' => 60,
        ]);
        DB::table('cities')->insert([
            'id' => 61,
            'display' => 1,
            'public' => 1,
            'serial' => 'rusutsu', 
            'code' => '397', 
            'name' => '虻田郡留寿都村',
            'label' => '留寿都村',
            'reorder' => 61,
        ]);
        DB::table('cities')->insert([
            'id' => 62,
            'display' => 1,
            'public' => 1,
            'serial' => 'kimobetsu', 
            'code' => '398', 
            'name' => '虻田郡喜茂別町',
            'label' => '喜茂別町',
            'reorder' => 62,
        ]);
        DB::table('cities')->insert([
            'id' => 63,
            'display' => 1,
            'public' => 1,
            'serial' => 'kyougoku', 
            'code' => '399', 
            'name' => '虻田郡京極町',
            'label' => '京極町',
            'reorder' => 63,
        ]);
        DB::table('cities')->insert([
            'id' => 64,
            'display' => 1,
            'public' => 1,
            'serial' => 'kuchan', 
            'code' => '400', 
            'name' => '虻田郡倶知安町',
            'label' => '倶知安町',
            'reorder' => 64,
        ]);
        DB::table('cities')->insert([
            'id' => 65,
            'display' => 1,
            'public' => 1,
            'serial' => 'kyouwa', 
            'code' => '401', 
            'name' => '岩内郡共和町',
            'label' => '共和町',
            'reorder' => 65,
        ]);
        DB::table('cities')->insert([
            'id' => 66,
            'display' => 1,
            'public' => 1,
            'serial' => 'iwanai', 
            'code' => '402', 
            'name' => '岩内郡岩内町',
            'label' => '岩内町',
            'reorder' => 66,
        ]);
        DB::table('cities')->insert([
            'id' => 67,
            'display' => 1,
            'public' => 1,
            'serial' => 'tomarii', 
            'code' => '403', 
            'name' => '古宇郡泊村',
            'label' => '泊村',
            'reorder' => 67,
        ]);
        DB::table('cities')->insert([
            'id' => 68,
            'display' => 1,
            'public' => 1,
            'serial' => 'kamoenai', 
            'code' => '404', 
            'name' => '古宇郡神恵内村',
            'label' => '神恵内村',
            'reorder' => 68,
        ]);
        DB::table('cities')->insert([
            'id' => 69,
            'display' => 1,
            'public' => 1,
            'serial' => 'syakotan', 
            'code' => '405', 
            'name' => '積丹郡積丹町',
            'label' => '積丹町',
            'reorder' => 69,
        ]);
        DB::table('cities')->insert([
            'id' => 70,
            'display' => 1,
            'public' => 1,
            'serial' => 'hurubira', 
            'code' => '406', 
            'name' => '古平郡古平町',
            'label' => '古平町',
            'reorder' => 70,
        ]);
        DB::table('cities')->insert([
            'id' => 71,
            'display' => 1,
            'public' => 1,
            'serial' => 'niki', 
            'code' => '407', 
            'name' => '余市郡仁木町',
            'label' => '仁木町',
            'reorder' => 71,
        ]);
        DB::table('cities')->insert([
            'id' => 72,
            'display' => 1,
            'public' => 1,
            'serial' => 'yoichi', 
            'code' => '408', 
            'name' => '余市郡余市町',
            'label' => '余市町',
            'reorder' => 72,
        ]);
        DB::table('cities')->insert([
            'id' => 73,
            'display' => 1,
            'public' => 1,
            'serial' => 'akaigawa', 
            'code' => '409', 
            'name' => '余市郡赤井川村',
            'label' => '赤井川村',
            'reorder' => 73,
        ]);
        DB::table('cities')->insert([
            'id' => 74,
            'display' => 1,
            'public' => 1,
            'serial' => 'nanporo', 
            'code' => '423', 
            'name' => '空知郡南幌町',
            'label' => '南幌町',
            'reorder' => 74,
        ]);
        DB::table('cities')->insert([
            'id' => 75,
            'display' => 1,
            'public' => 1,
            'serial' => 'naie', 
            'code' => '424', 
            'name' => '空知郡奈井江町',
            'label' => '奈井江町',
            'reorder' => 75,
        ]);
        DB::table('cities')->insert([
            'id' => 76,
            'display' => 1,
            'public' => 1,
            'serial' => 'kamisunagawa', 
            'code' => '425', 
            'name' => '空知郡上砂川町',
            'label' => '空知郡上砂川町',
            'reorder' => 76,
        ]);
        DB::table('cities')->insert([
            'id' => 77,
            'display' => 1,
            'public' => 1,
            'serial' => 'yuni', 
            'code' => '427', 
            'name' => '夕張郡由仁町',
            'label' => '由仁町',
            'reorder' => 77,
        ]);
        DB::table('cities')->insert([
            'id' => 78,
            'display' => 1,
            'public' => 1,
            'serial' => 'naganuma', 
            'code' => '428', 
            'name' => '夕張郡長沼町',
            'label' => '長沼町',
            'reorder' => 78,
        ]);
        DB::table('cities')->insert([
            'id' => 79,
            'display' => 1,
            'public' => 1,
            'serial' => 'kuriyama', 
            'code' => '429', 
            'name' => '夕張郡栗山町',
            'label' => '栗山町',
            'reorder' => 79,
        ]);
        DB::table('cities')->insert([
            'id' => 80,
            'display' => 1,
            'public' => 1,
            'serial' => 'tsugitaka', 
            'code' => '430', 
            'name' => '樺戸郡月形町',
            'label' => '月形町',
            'reorder' => 80,
        ]);
        DB::table('cities')->insert([
            'id' => 81,
            'display' => 1,
            'public' => 1,
            'serial' => 'urausu', 
            'code' => '431', 
            'name' => '樺戸郡浦臼町',
            'label' => '浦臼町',
            'reorder' => 81,
        ]);
        DB::table('cities')->insert([
            'id' => 82,
            'display' => 1,
            'public' => 1,
            'serial' => 'shintotsugawa', 
            'code' => '432', 
            'name' => '樺戸郡新十津川町',
            'label' => '新十津川町',
            'reorder' => 82,
        ]);
        DB::table('cities')->insert([
            'id' => 83,
            'display' => 1,
            'public' => 1,
            'serial' => 'moseushi', 
            'code' => '433', 
            'name' => '雨竜郡妹背牛町',
            'label' => '妹背牛町',
            'reorder' => 83,
        ]);
        DB::table('cities')->insert([
            'id' => 84,
            'display' => 1,
            'public' => 1,
            'serial' => 'chippubetsu', 
            'code' => '434', 
            'name' => '雨竜郡秩父別町',
            'label' => '秩父別町',
            'reorder' => 84,
        ]);
        DB::table('cities')->insert([
            'id' => 85,
            'display' => 1,
            'public' => 1,
            'serial' => 'uryu', 
            'code' => '436', 
            'name' => '雨竜郡雨竜町',
            'label' => '雨竜郡雨竜町',
            'reorder' => 85,
        ]);
        DB::table('cities')->insert([
            'id' => 86,
            'display' => 1,
            'public' => 1,
            'serial' => 'numata', 
            'code' => '438', 
            'name' => '雨竜郡沼田町',
            'label' => '雨竜郡沼田町',
            'reorder' => 86,
        ]);
        DB::table('cities')->insert([
            'id' => 87,
            'display' => 1,
            'public' => 1,
            'serial' => 'takasu', 
            'code' => '452', 
            'name' => '上川郡鷹栖町',
            'label' => '鷹栖町',
            'reorder' => 87,
        ]);
        DB::table('cities')->insert([
            'id' => 88,
            'display' => 1,
            'public' => 1,
            'serial' => 'higashikagura', 
            'code' => '453', 
            'name' => '上川郡東神楽町',
            'label' => '東神楽町',
            'reorder' => 88,
        ]);
        DB::table('cities')->insert([
            'id' => 89,
            'display' => 1,
            'public' => 1,
            'serial' => 'touma', 
            'code' => '454', 
            'name' => '上川郡当麻町',
            'label' => '当麻町',
            'reorder' => 89,
        ]);
        DB::table('cities')->insert([
            'id' => 90,
            'display' => 1,
            'public' => 1,
            'serial' => 'pippu', 
            'code' => '455', 
            'name' => '上川郡比布町',
            'label' => '比布町',
            'reorder' => 90,
        ]);
        DB::table('cities')->insert([
            'id' => 91,
            'display' => 1,
            'public' => 1,
            'serial' => 'aibetsu', 
            'code' => '456', 
            'name' => '上川郡愛別町',
            'label' => '愛別町',
            'reorder' => 91,
        ]);
        DB::table('cities')->insert([
            'id' => 92,
            'display' => 1,
            'public' => 1,
            'serial' => 'kamikawa', 
            'code' => '457', 
            'name' => '上川郡上川町',
            'label' => '上川町',
            'reorder' => 92,
        ]);
        DB::table('cities')->insert([
            'id' => 93,
            'display' => 1,
            'public' => 1,
            'serial' => 'higashikawa', 
            'code' => '458', 
            'name' => '上川郡東川町',
            'label' => '東川町',
            'reorder' => 93,
        ]);
        DB::table('cities')->insert([
            'id' => 94,
            'display' => 1,
            'public' => 1,
            'serial' => 'biei', 
            'code' => '459', 
            'name' => '上川郡美瑛町',
            'label' => '美瑛町',
            'reorder' => 94,
        ]);
        DB::table('cities')->insert([
            'id' => 95,
            'display' => 1,
            'public' => 1,
            'serial' => 'kamifurano', 
            'code' => '460', 
            'name' => '空知郡上富良野町',
            'label' => '上富良野町',
            'reorder' => 95,
        ]);
        DB::table('cities')->insert([
            'id' => 96,
            'display' => 1,
            'public' => 1,
            'serial' => 'nakafurano', 
            'code' => '461', 
            'name' => '空知郡中富良野町',
            'label' => '中富良野町',
            'reorder' => 96,
        ]);
        DB::table('cities')->insert([
            'id' => 97,
            'display' => 1,
            'public' => 1,
            'serial' => 'minamifurano', 
            'code' => '462', 
            'name' => '空知郡南富良野町',
            'label' => '南富良野町',
            'reorder' => 97,
        ]);
        DB::table('cities')->insert([
            'id' => 98,
            'display' => 1,
            'public' => 1,
            'serial' => 'shimukappu', 
            'code' => '463', 
            'name' => '勇払郡占冠村', 
            'label' => '占冠村',
            'reorder' => 98,
        ]);
        DB::table('cities')->insert([
            'id' => 99,
            'display' => 1,
            'public' => 1,
            'serial' => 'wassamu', 
            'code' => '464', 
            'name' => '上川郡和寒町',
            'label' => '和寒町',
            'reorder' => 99,
        ]);
        DB::table('cities')->insert([
            'id' => 100,
            'display' => 1,
            'public' => 1,
            'serial' => 'kenbuchi', 
            'code' => '465', 
            'name' => '上川郡剣淵町',
            'label' => '剣淵町',
            'reorder' => 100,
        ]);
        DB::table('cities')->insert([
            'id' => 101,
            'display' => 1,
            'public' => 1,
            'serial' => 'shimokawa', 
            'code' => '468', 
            'name' => '上川郡下川町',
            'label' => '下川町',
            'reorder' => 101,
        ]);
        DB::table('cities')->insert([
            'id' => 102,
            'display' => 1,
            'public' => 1,
            'serial' => 'bifuka', 
            'code' => '469', 
            'name' => '中川郡美深町',
            'label' => '美深町',
            'reorder' => 102,
        ]);
        DB::table('cities')->insert([
            'id' => 103,
            'display' => 1,
            'public' => 1,
            'serial' => 'otoineppu', 
            'code' => '470', 
            'name' => '中川郡音威子府村',
            'label' => '音威子府村',
            'reorder' => 103,
        ]);
        DB::table('cities')->insert([
            'id' => 104,
            'display' => 1,
            'public' => 1,
            'serial' => 'nakagawa', 
            'code' => '471', 
            'name' => '中川郡中川町',
            'label' => '中川町',
            'reorder' => 104,
        ]);
        DB::table('cities')->insert([
            'id' => 105,
            'display' => 1,
            'public' => 1,
            'serial' => 'horokanai', 
            'code' => '472', 
            'name' => '雨竜郡幌加内町',
            'label' => '幌加内町',
            'reorder' => 105,
        ]);
        DB::table('cities')->insert([
            'id' => 106,
            'display' => 1,
            'public' => 1,
            'serial' => 'mashike', 
            'code' => '481', 
            'name' => '増毛郡増毛町',
            'label' => '増毛町',
            'reorder' => 106,
        ]);
        DB::table('cities')->insert([
            'id' => 107,
            'display' => 1,
            'public' => 1,
            'serial' => 'obira', 
            'code' => '482', 
            'name' => '留萌郡小平町',
            'label' => '小平町',
            'reorder' => 107,
        ]);
        DB::table('cities')->insert([
            'id' => 108,
            'display' => 1,
            'public' => 1,
            'serial' => 'tomamae', 
            'code' => '483', 
            'name' => '苫前郡苫前町',
            'label' => '苫前町',
            'reorder' => 108,
        ]);
        DB::table('cities')->insert([
            'id' => 109,
            'display' => 1,
            'public' => 1,
            'serial' => 'haboro', 
            'code' => '484', 
            'name' => '苫前郡羽幌町',
            'label' => '羽幌町',
            'reorder' => 109,
        ]);
        DB::table('cities')->insert([
            'id' => 110,
            'display' => 1,
            'public' => 1,
            'serial' => 'syosanbetsu', 
            'code' => '485', 
            'name' => '苫前郡初山別村',
            'label' => '初山別村',
            'reorder' => 110,
        ]);
        DB::table('cities')->insert([
            'id' => 111,
            'display' => 1,
            'public' => 1,
            'serial' => 'enbetsu', 
            'code' => '486', 
            'name' => '天塩郡遠別町',
            'label' => '遠別町',
            'reorder' => 111,
        ]);
        DB::table('cities')->insert([
            'id' => 112,
            'display' => 1,
            'public' => 1,
            'serial' => 'teshio', 
            'code' => '487', 
            'name' => '天塩郡天塩町',
            'label' => '天塩町',
            'reorder' => 112,
        ]);
        DB::table('cities')->insert([
            'id' => 113,
            'display' => 1,
            'public' => 1,
            'serial' => 'sarufutsu', 
            'code' => '511', 
            'name' => '宗谷郡猿払村',
            'label' => '猿払村',
            'reorder' => 113,
        ]);
        DB::table('cities')->insert([
            'id' => 114,
            'display' => 1,
            'public' => 1,
            'serial' => 'hamatonbetsu', 
            'code' => '512', 
            'name' => '枝幸郡浜頓別町',
            'label' => '浜頓別町',
            'reorder' => 114,
        ]);
        DB::table('cities')->insert([
            'id' => 115,
            'display' => 1,
            'public' => 1,
            'serial' => 'nakatonbetsu', 
            'code' => '513', 
            'name' => '枝幸郡中頓別町',
            'label' => '中頓別町',
            'reorder' => 115,
        ]);
        DB::table('cities')->insert([
            'id' => 116,
            'display' => 1,
            'public' => 1,
            'serial' => 'esashi_s', 
            'code' => '514', 
            'name' => '枝幸郡枝幸町',
            'label' => '枝幸町',
            'reorder' => 116,
        ]);
        DB::table('cities')->insert([
            'id' => 117,
            'display' => 1,
            'public' => 1,
            'serial' => 'toyotomi', 
            'code' => '516', 
            'name' => '天塩郡豊富町',
            'label' => '豊富町',
            'reorder' => 117,
        ]);
        DB::table('cities')->insert([
            'id' => 118,
            'display' => 1,
            'public' => 1,
            'serial' => 'rebun', 
            'code' => '517', 
            'name' => '礼文郡礼文町',
            'label' => '礼文町',
            'reorder' => 118,
        ]);
        DB::table('cities')->insert([
            'id' => 119,
            'display' => 1,
            'public' => 1,
            'serial' => 'rishiri', 
            'code' => '518', 
            'name' => '利尻郡利尻町',
            'label' => '利尻町',
            'reorder' => 119,
        ]);
        DB::table('cities')->insert([
            'id' => 120,
            'display' => 1,
            'public' => 1,
            'serial' => 'rishirifuji', 
            'code' => '519', 
            'name' => '利尻郡利尻富士町',
            'label' => '利尻富士町',
            'reorder' => 120,
        ]);
        DB::table('cities')->insert([
            'id' => 121,
            'display' => 1,
            'public' => 1,
            'serial' => 'horonobe', 
            'code' => '520', 
            'name' => '天塩郡幌延町',
            'label' => '幌延町',
            'reorder' => 121,
        ]);
        DB::table('cities')->insert([
            'id' => 122,
            'display' => 1,
            'public' => 1,
            'serial' => 'bihoro', 
            'code' => '543', 
            'name' => '網走郡美幌町',
            'label' => '美幌町',
            'reorder' => 122,
        ]);
        DB::table('cities')->insert([
            'id' => 123,
            'display' => 1,
            'public' => 1,
            'serial' => 'tsubetsu', 
            'code' => '544', 
            'name' => '網走郡津別町',
            'label' => '津別町',
            'reorder' => 123,
        ]);
        DB::table('cities')->insert([
            'id' => 124,
            'display' => 1,
            'public' => 1,
            'serial' => 'syari', 
            'code' => '545', 
            'name' => '斜里郡斜里町',
            'label' => '斜里町',
            'reorder' => 124,
        ]);
        DB::table('cities')->insert([
            'id' => 125,
            'display' => 1,
            'public' => 1,
            'serial' => 'kiyosato', 
            'code' => '546', 
            'name' => '斜里郡清里町',
            'label' => '清里町',
            'reorder' => 125,
        ]);
        DB::table('cities')->insert([
            'id' => 126,
            'display' => 1,
            'public' => 1,
            'serial' => 'koshimizu', 
            'code' => '547', 
            'name' => '斜里郡小清水町',
            'label' => '小清水町',
            'reorder' => 126,
        ]);
        DB::table('cities')->insert([
            'id' => 127,
            'display' => 1,
            'public' => 1,
            'serial' => 'kunneppu', 
            'code' => '549', 
            'name' => '常呂郡訓子府町',
            'label' => '訓子府町',
            'reorder' => 127,
        ]);
        DB::table('cities')->insert([
            'id' => 128,
            'display' => 1,
            'public' => 1,
            'serial' => 'oketo', 
            'code' => '550', 
            'name' => '常呂郡置戸町',
            'label' => '置戸町',
            'reorder' => 128,
        ]);
        DB::table('cities')->insert([
            'id' => 129,
            'display' => 1,
            'public' => 1,
            'serial' => 'saroma', 
            'code' => '552', 
            'name' => '常呂郡佐呂間町',
            'label' => '佐呂間町',
            'reorder' => 129,
        ]);
        DB::table('cities')->insert([
            'id' => 130,
            'display' => 1,
            'public' => 1,
            'serial' => 'engaru', 
            'code' => '555', 
            'name' => '紋別郡遠軽町',
            'label' => '遠軽町',
            'reorder' => 130,
        ]);
        DB::table('cities')->insert([
            'id' => 131,
            'display' => 1,
            'public' => 1,
            'serial' => 'yubetsu', 
            'code' => '559', 
            'name' => '紋別郡湧別町',
            'label' => '湧別町',
            'reorder' => 131,
        ]);
        DB::table('cities')->insert([
            'id' => 132,
            'display' => 1,
            'public' => 1,
            'serial' => 'takinoue', 
            'code' => '560', 
            'name' => '紋別郡滝上町',
            'label' => '滝上町',
            'reorder' => 132,
        ]);
        DB::table('cities')->insert([
            'id' => 133,
            'display' => 1,
            'public' => 1,
            'serial' => 'okoppe', 
            'code' => '561', 
            'name' => '紋別郡興部町',
            'label' => '興部町',
            'reorder' => 133,
        ]);
        DB::table('cities')->insert([
            'id' => 134,
            'display' => 1,
            'public' => 1,
            'serial' => 'nishiokoppe', 
            'code' => '562', 
            'name' => '紋別郡西興部村',
            'label' => '西興部村', 
            'reorder' => 134,
        ]);
        DB::table('cities')->insert([
            'id' => 135,
            'display' => 1,
            'public' => 1,
            'serial' => 'oumu', 
            'code' => '563', 
            'name' => '紋別郡雄武町',
            'label' => '雄武町',
            'reorder' => 135,
        ]);
        DB::table('cities')->insert([
            'id' => 136,
            'display' => 1,
            'public' => 1,
            'serial' => 'oozora', 
            'code' => '564', 
            'name' => '網走郡大空町',
            'label' => '大空町',
            'reorder' => 136,
        ]);
        DB::table('cities')->insert([
            'id' => 137,
            'display' => 1,
            'public' => 1,
            'serial' => 'toyohura', 
            'code' => '571', 
            'name' => '虻田郡豊浦町',
            'label' => '豊浦町',
            'reorder' => 137,
        ]);
        DB::table('cities')->insert([
            'id' => 138,
            'display' => 1,
            'public' => 1,
            'serial' => 'soubetsu', 
            'code' => '575', 
            'name' => '有珠郡壮瞥町',
            'label' => '壮瞥町',
            'reorder' => 138,
        ]);
        DB::table('cities')->insert([
            'id' => 139,
            'display' => 1,
            'public' => 1,
            'serial' => 'shiraoi', 
            'code' => '578', 
            'name' => '白老郡白老町',
            'label' => '白老町',
            'reorder' => 139,
        ]);
        DB::table('cities')->insert([
            'id' => 140,
            'display' => 1,
            'public' => 1,
            'serial' => 'atsuma', 
            'code' => '581', 
            'name' => '勇払郡厚真町',
            'label' => '厚真町',
            'reorder' => 140,
        ]);
        DB::table('cities')->insert([
            'id' => 141,
            'display' => 1,
            'public' => 1,
            'serial' => 'touyako', 
            'code' => '584', 
            'name' => '虻田郡洞爺湖町',
            'label' => '洞爺湖町',
            'reorder' => 141,
        ]);
        DB::table('cities')->insert([
            'id' => 142,
            'display' => 1,
            'public' => 1,
            'serial' => 'abira', 
            'code' => '585', 
            'name' => '勇払郡安平町',
            'label' => '安平町',
            'reorder' => 142,
        ]);
        DB::table('cities')->insert([
            'id' => 143,
            'display' => 1,
            'public' => 1,
            'serial' => 'mukawa', 
            'code' => '586', 
            'name' => '勇払郡むかわ町',
            'label' => 'むかわ町',
            'reorder' => 143,
        ]);
        DB::table('cities')->insert([
            'id' => 144,
            'display' => 1,
            'public' => 1,
            'serial' => 'hidaka', 
            'code' => '601', 
            'name' => '沙流郡日高町',
            'label' => '日高町',
            'reorder' => 144,
        ]);
        DB::table('cities')->insert([
            'id' => 145,
            'display' => 1,
            'public' => 1,
            'serial' => 'biratori', 
            'code' => '602', 
            'name' => '沙流郡平取町',
            'label' => '平取町',
            'reorder' => 145,
        ]);
        DB::table('cities')->insert([
            'id' => 146,
            'display' => 1,
            'public' => 1,
            'serial' => 'niikappu', 
            'code' => '604', 
            'name' => '新冠郡新冠町',
            'label' => '新冠町',
            'reorder' => 146,
        ]);
        DB::table('cities')->insert([
            'id' => 147,
            'display' => 1,
            'public' => 1,
            'serial' => 'urakawa', 
            'code' => '607', 
            'name' => '浦河郡浦河町',
            'label' => '浦河町',
            'reorder' => 147,
        ]);
        DB::table('cities')->insert([
            'id' => 148,
            'display' => 1,
            'public' => 1,
            'serial' => 'samani', 
            'code' => '608', 
            'name' => '様似郡様似町',
            'label' => '様似町',
            'reorder' => 148,
        ]);
        DB::table('cities')->insert([
            'id' => 149,
            'display' => 1,
            'public' => 1,
            'serial' => 'erimo', 
            'code' => '609', 
            'name' => '幌泉郡えりも町',
            'label' => 'えりも町',
            'reorder' => 149,
        ]);
        DB::table('cities')->insert([
            'id' => 150,
            'display' => 1,
            'public' => 1,
            'serial' => 'shinhidaka', 
            'code' => '610', 
            'name' => '日高郡新ひだか町',
            'label' => '新ひだか町',
            'reorder' => 150,
        ]);
        DB::table('cities')->insert([
            'id' => 151,
            'display' => 1,
            'public' => 1,
            'serial' => 'otofuke', 
            'code' => '631', 
            'name' => '河東郡音更町',
            'label' => '音更町',
            'reorder' => 151,
        ]);
        DB::table('cities')->insert([
            'id' => 152,
            'display' => 1,
            'public' => 1,
            'serial' => 'shihoro', 
            'code' => '632', 
            'name' => '河東郡士幌町',
            'label' => '士幌町',
            'reorder' => 151,
        ]);
        DB::table('cities')->insert([
            'id' => 153,
            'display' => 1,
            'public' => 1,
            'serial' => 'kamishihoro', 
            'code' => '633', 
            'name' => '河東郡上士幌町',
            'label' => '上士幌町',
            'reorder' => 152,
        ]);
        DB::table('cities')->insert([
            'id' => 154,
            'display' => 1,
            'public' => 1,
            'serial' => 'shikaoi', 
            'code' => '634', 
            'name' => '河東郡鹿追町',
            'label' => '鹿追町',
            'reorder' => 154,
        ]);
        DB::table('cities')->insert([
            'id' => 155,
            'display' => 1,
            'public' => 1,
            'serial' => 'shintoku', 
            'code' => '635', 
            'name' => '上川郡新得町',
            'label' => '新得町',
            'reorder' => 155,
        ]);
        DB::table('cities')->insert([
            'id' => 156,
            'display' => 1,
            'public' => 1,
            'serial' => 'shimizu', 
            'code' => '636', 
            'name' => '上川郡清水町',
            'label' => '清水町',
            'reorder' => 156,
        ]);
        DB::table('cities')->insert([
            'id' => 157,
            'display' => 1,
            'public' => 1,
            'serial' => 'memuro', 
            'code' => '637', 
            'name' => '河西郡芽室町',
            'label' => '芽室町',
            'reorder' => 157,
        ]);
        DB::table('cities')->insert([
            'id' => 158,
            'display' => 1,
            'public' => 1,
            'serial' => 'nakasatsunai', 
            'code' => '638', 
            'name' => '河西郡中札内村',
            'label' => '中札内村',
            'reorder' => 158,
        ]);
        DB::table('cities')->insert([
            'id' => 159,
            'display' => 1,
            'public' => 1,
            'serial' => 'sarabetsu', 
            'code' => '639', 
            'name' => '河西郡更別村',
            'label' => '更別村',
            'reorder' => 159,
        ]);
        DB::table('cities')->insert([
            'id' => 160,
            'display' => 1,
            'public' => 1,
            'serial' => 'taiki', 
            'code' => '641', 
            'name' => '広尾郡大樹町',
            'label' => '大樹町',
            'reorder' => 160,
        ]);
        DB::table('cities')->insert([
            'id' => 161,
            'display' => 1,
            'public' => 1,
            'serial' => 'hioo', 
            'code' => '642', 
            'name' => '広尾郡広尾町',
            'label' => '広尾町',
            'reorder' => 161,
        ]);
        DB::table('cities')->insert([
            'id' => 162,
            'display' => 1,
            'public' => 1,
            'serial' => 'makubetsu', 
            'code' => '643', 
            'name' => '中川郡幕別町',
            'label' => '幕別町',
            'reorder' => 162,
        ]);
        DB::table('cities')->insert([
            'id' => 163,
            'display' => 1,
            'public' => 1,
            'serial' => 'ikeda', 
            'code' => '644', 
            'name' => '中川郡池田町',
            'label' => '池田町',
            'reorder' => 163,
        ]);
        DB::table('cities')->insert([
            'id' => 164,
            'display' => 1,
            'public' => 1,
            'serial' => 'toyokoro', 
            'code' => '645', 
            'name' => '中川郡豊頃町',
            'label' => '豊頃町',
            'reorder' => 164,
        ]);
        DB::table('cities')->insert([
            'id' => 165,
            'display' => 1,
            'public' => 1,
            'serial' => 'honbetsu', 
            'code' => '646', 
            'name' => '中川郡本別町',
            'label' => '本別町',
            'reorder' => 165,
        ]);
        DB::table('cities')->insert([
            'id' => 166,
            'display' => 1,
            'public' => 1,
            'serial' => 'asyoro', 
            'code' => '647', 
            'name' => '足寄郡足寄町',
            'label' => '足寄町',
            'reorder' => 166,
        ]);
        DB::table('cities')->insert([
            'id' => 167,
            'display' => 1,
            'public' => 1,
            'serial' => 'rikubetsu', 
            'code' => '648', 
            'name' => '足寄郡陸別町',
            'label' => '陸別町',
            'reorder' => 167,
        ]);
        DB::table('cities')->insert([
            'id' => 168,
            'display' => 1,
            'public' => 1,
            'serial' => 'urahoro', 
            'code' => '649', 
            'name' => '十勝郡浦幌町',
            'label' => '浦幌町',
            'reorder' => 168,
        ]);
        DB::table('cities')->insert([
            'id' => 169,
            'display' => 1,
            'public' => 1,
            'serial' => 'kushirocho', 
            'code' => '661', 
            'name' => '釧路郡釧路町',
            'label' => '釧路町',
            'reorder' => 174,
        ]);
        DB::table('cities')->insert([
            'id' => 170,
            'display' => 1,
            'public' => 1,
            'serial' => 'akkeshi', 
            'code' => '662', 
            'name' => '厚岸郡厚岸町',
            'label' => '厚岸町',
            'reorder' => 170,
        ]);
        DB::table('cities')->insert([
            'id' => 171,
            'display' => 1,
            'public' => 1,
            'serial' => 'hamanaka', 
            'code' => '663', 
            'name' => '厚岸郡浜中町',
            'label' => '浜中町',
            'reorder' => 171,
        ]);
        DB::table('cities')->insert([
            'id' => 172,
            'display' => 1,
            'public' => 1,
            'serial' => 'shibecha', 
            'code' => '664', 
            'name' => '川上郡標茶町',
            'label' => '標茶町',
            'reorder' => 172,
        ]);
        DB::table('cities')->insert([
            'id' => 173,
            'display' => 1,
            'public' => 1,
            'serial' => 'teshikaga', 
            'code' => '665', 
            'name' => '川上郡弟子屈町',
            'label' => '弟子屈町',
            'reorder' => 173,
        ]);
        DB::table('cities')->insert([
            'id' => 174,
            'display' => 1,
            'public' => 1,
            'serial' => 'tsurui', 
            'code' => '667', 
            'name' => '阿寒郡鶴居村',
            'label' => '鶴居村',
            'reorder' => 174,
        ]);
        DB::table('cities')->insert([
            'id' => 175,
            'display' => 1,
            'public' => 1,
            'serial' => 'hokuryu', 
            'code' => '437', 
            'name' => '雨竜郡北竜町',
            'label' => '雨竜郡北竜町',
            'reorder' => 175,
        ]);
        DB::table('cities')->insert([
            'id' => 176,
            'display' => 1,
            'public' => 1,
            'serial' => 'shiranuka', 
            'code' => '668', 
            'name' => '白糠郡白糠町',
            'label' => '白糠町',
            'reorder' => 176,
        ]);
        DB::table('cities')->insert([
            'id' => 177,
            'display' => 1,
            'public' => 1,
            'serial' => 'betsukai', 
            'code' => '691', 
            'name' => '野付郡別海町',
            'label' => '別海町',
            'reorder' => 177,
        ]);
        DB::table('cities')->insert([
            'id' => 178,
            'display' => 1,
            'public' => 1,
            'serial' => 'nakashibetsu', 
            'code' => '692', 
            'name' => '標津郡中標津町',
            'label' => '中標津町',
            'reorder' => 178,
        ]);
        DB::table('cities')->insert([
            'id' => 179,
            'display' => 1,
            'public' => 1,
            'serial' => 'shibetsu_n', 
            'code' => '693', 
            'name' => '標津郡標津町',
            'label' => '標津町',
            'reorder' => 179,
        ]);
        DB::table('cities')->insert([
            'id' => 180,
            'display' => 1,
            'public' => 1,
            'serial' => 'rausu', 
            'code' => '694', 
            'name' => '目梨郡羅臼町',
            'label' => '羅臼町',
            'reorder' => 180,
        ]);
    }
}

