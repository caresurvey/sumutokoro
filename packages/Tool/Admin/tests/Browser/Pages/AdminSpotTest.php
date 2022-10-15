<?php

namespace Tool\Admin\tests\Browser\Pages;

use Tests\DuskTestCase;

class AdminSpotTest extends DuskTestCase
{
    /**
     * @test
     */
    public function 事業所管理テスト()
    {
        $this->browse(function ($browser) {

            // ログイン
            $browser->visit('/admin/login');
            $browser->pause(1000);
            $browser->type('#LoginEmail', 'root@hoge.co.jp');
            $browser->type('#LoginPassword', 'password');
            $browser->click('#LoginSubmit');
            $browser->pause(1000);
            $browser->assertSee('管理画面');

            // 一覧
            $browser->visit('/admin/spot');
            $browser->pause(1000);
            $browser->assertSee('20件がみつかりました');

            // 追加
            $browser->pause(1000);
            $browser->click('#SpotAddBtn');
            $browser->type('#SpotName', '追加事業所');
            $browser->click('#SpotAddSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('事業所情報編集');
            $browser->assertSee('追加事業所の編集ができます');

            // 入力
            $browser->scrollIntoView('#SpotAreaCenter')->select('#SpotAreaCenter', '3');
            $browser->scrollIntoView('#SpotCategory')->select('#SpotCategory', '3');
            $browser->scrollIntoView('#SpotName')->type('#SpotName', '追加事業所変更');
            $browser->scrollIntoView('#SpotZip1')->type('#SpotZip1', '079');
            $browser->scrollIntoView('#SpotZip2')->type('#SpotZip2', '0009');
            $browser->scrollIntoView('#SpotPrefecture')->select('#SpotPrefecture', '3');
            $browser->scrollIntoView('#SpotCity')->select('#SpotCity', '3');
            $browser->scrollIntoView('#SpotAddress')->type('#SpotAddress', '追加住所変更');
            $browser->scrollIntoView('#SpotTel1')->type('#SpotTel1', '099');
            $browser->scrollIntoView('#SpotTel2')->type('#SpotTel2', '1239');
            $browser->scrollIntoView('#SpotTel3')->type('#SpotTel3', '4569');
            $browser->scrollIntoView('#SpotDetailFax')->type('#SpotDetailFax', '0166-123-4569');
            $browser->scrollIntoView('#SpotDetailEmail')->type('#SpotDetailEmail', 'add_edit@hoge.co.jp');
            $browser->scrollIntoView('#SpotDetailStaff')->type('#SpotDetailStaff', '追加スタッフ変更');
            $browser->scrollIntoView('#SpotDetailCompanyName')->type('#SpotDetailCompanyName', '追加運営会社変更');
            $browser->scrollIntoView('#SpotDetailCompanyStaff')->type('#SpotDetailCompanyStaff', '追加運営スタッフ変更');
            $browser->scrollIntoView('#SpotMonthlyPriceMin')->select('#SpotIconItem_status_self', '3');
            $browser->select('#SpotIconItem_status_support', '3');
            $browser->select('#SpotIconItem_status_care', '3');
            $browser->select('#SpotIconItem_status_dementia', '3');
            $browser->select('#SpotIconItem_status_disability', '3');
            $browser->select('#SpotIconItem_status_nursing', '3');
            $browser->type('#SpotMonthlyPriceMin', '111');
            $browser->type('#SpotMonthlyPriceMax', '222');
            $browser->check('#SpotForCheckMonthly');
            $browser->scrollIntoView('#SpotMoveinPriceMin')->type('#SpotMoveinPriceMin', '333');
            $browser->type('#SpotMoveinPriceMax', '444');
            $browser->check('#SpotForCheckMovein');
            $browser->scrollIntoView('#SpotPriceRange')->select('spot[price_range_id]', '3');
            $browser->scrollIntoView('#SpotPrice1')->type('#SpotPrice1', '追加家賃変更');
            $browser->type('#SpotPrice2', '追加管理費変更');
            $browser->type('#SpotPrice3', '追加食費変更');
            $browser->type('#SpotPrice4', '追加水道光熱費変更');
            $browser->type('#SpotPrice5', '追加冬期暖房費変更');
            $browser->type('#SpotPrice6', '追加その他変更');
            $browser->type('#SpotRoomSize', '追加99畳変更');
            $browser->scrollIntoView('#SpotSpace')->select('#SpotSpace', '3');
            $browser->scrollIntoView('#SpotDetailRooms')->type('#SpotDetailRooms', '追加99室変更');
            $browser->scrollIntoView('#SpotIconItem_privatespace_toilet')->select('#SpotIconItem_privatespace_toilet', '3');
            $browser->select('#SpotIconItem_privatespace_washstand', '3');
            $browser->select('#SpotIconItem_privatespace_closet', '3');
            $browser->select('#SpotIconItem_privatespace_kitchen', '3');
            $browser->select('#SpotIconItem_privatespace_bath', '3');
            $browser->select('#SpotIconItem_privatespace_bed', '3');
            $browser->select('#SpotIconItem_privatespace_internet', '3');
            $browser->scrollIntoView('#SpotDetailNurses')->type('#SpotDetailNurses', '追加99人変更');
            $browser->scrollIntoView('#SpotDetailNurseTime')->type('#SpotDetailNurseTime', '追加10時〜20時変更');
            $browser->scrollIntoView('#SpotIconItem_nursing_infection')->select('#SpotIconItem_nursing_infection', '3');
            $browser->select('#SpotIconItem_nursing_baloon', '3');
            $browser->select('#SpotIconItem_nursing_uc', '3');
            $browser->select('#SpotIconItem_nursing_insulin', '3');
            $browser->select('#SpotIconItem_nursing_gastrostomy', '3');
            $browser->select('#SpotIconItem_nursing_nn', '3');
            $browser->select('#SpotIconItem_nursing_stoma', '3');
            $browser->select('#SpotIconItem_nursing_dialysis', '3');
            $browser->select('#SpotIconItem_nursing_suction', '3');
            $browser->select('#SpotIconItem_nursing_injection', '3');
            $browser->select('#SpotIconItem_nursing_ivh', '3');
            $browser->select('#SpotIconItem_nursing_bedsores', '3');
            $browser->select('#SpotIconItem_nursing_home_oxygen', '3');
            $browser->select('#SpotIconItem_nursing_terminal', '3');
            $browser->select('#SpotIconItem_nursing_drag', '3');
            $browser->scrollIntoView('#SpotIconItem_care_eatingsupport')->select('#SpotIconItem_care_eatingsupport', '3');
            $browser->select('#SpotIconItem_care_excretion', '3');
            $browser->select('#SpotIconItem_care_bathingsupport', '3');
            $browser->select('#SpotIconItem_care_specialbath', '3');
            $browser->select('#SpotIconItem_care_visitsupport', '3');
            $browser->select('#SpotIconItem_care_roomcleanup', '3');
            $browser->select('#SpotIconItem_care_shopping', '3');
            $browser->select('#SpotIconItem_care_money', '3');
            $browser->select('#SpotIconItem_care_medicine', '3');
            $browser->select('#SpotIconItem_care_hospitalsupport', '3');
            $browser->scrollIntoView('#SpotIconItem_other_hogo')->select('#SpotIconItem_other_hogo', '3');
            $browser->select('#SpotIconItem_other_pet', '3');
            $browser->select('#SpotIconItem_other_age', '3');
            $browser->select('#SpotIconItem_other_pare', '3');
            $browser->select('#SpotIconItem_other_trial', '3');
            $browser->scrollIntoView('#SpotDetailStaffs')->type('#SpotDetailStaffs', '追加99人変更');
            $browser->scrollIntoView('#SpotHeading')->type('#SpotHeading', '追加タイトル変更');
            $browser->scrollIntoView('#SpotMessage')->type('#SpotMessage', '追加メッセージ変更');
            $browser->scrollIntoView('#SpotDetailIntroducer')->type('#SpotDetailIntroducer', '追加紹介者変更');
            $browser->scrollIntoView('#SpotDetailFeature')->type('#SpotDetailFeature', '追加その他変更');
            $browser->scrollIntoView('#SpotDetailComment')->type('#SpotDetailComment', '追加メモ1変更');
            $browser->scrollIntoView('#SpotDetailComment2')->type('#SpotDetailComment2', '追加メモ2変更');
            $browser->scrollIntoView('#SpotIsMeeting')->check('#SpotIsMeeting');
            $browser->scrollIntoView('#SpotIsBook')->check('#SpotIsBook');
            $browser->click('#SpotBook2');
            $browser->click('#SpotBook3');
            $browser->click('#SpotBook4');
            $browser->click('#SpotBook5');
            $browser->click('#SpotBook6');
            $browser->click('#SpotBook7');
            $browser->scrollIntoView('#SpotDisplay')->check('#SpotDisplay');
            $browser->scrollIntoView('#SpotPreview')->check('#SpotPreview');
            $browser->scrollIntoView('#SpotVacancy3')->radio('#SpotVacancy3', '3');
            $browser->scrollIntoView('#SpotDocument3')->radio('#SpotDocument3', '3');
            $browser->scrollIntoView('#SpotViewing3')->radio('#SpotViewing3', '3');
            $browser->scrollIntoView('#SpotTradeArea')->select('#SpotTradeArea', '3');
            $browser->scrollIntoView('#SpotSpotPlan')->select('#SpotSpotPlan', '2');
            $browser->scrollIntoView('#SpotLat')->type('#SpotLat', '44.96281006321748');
            $browser->scrollIntoView('#SpotLng')->type('#SpotLng', '143.95817790725756');
            $browser->scrollIntoView('#SpotSubmit')->click('#SpotSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('追加事業所変更を変更しました');
            $browser->assertSee('地図設定済み');

            // 入力が反映されたか確認
            $browser->assertSelected('#SpotAreaCenter', '3');
            $browser->assertSelected('#SpotCategory', '3');
            $browser->assertInputValue('#SpotName', '追加事業所変更');
            $browser->assertInputValue('#SpotZip1', '079');
            $browser->assertInputValue('#SpotZip2', '0009');
            $browser->assertSelected('#SpotPrefecture', '3');
            $browser->assertSelected('#SpotCity', '3');
            $browser->scrollIntoView('#SpotAddress')->assertInputValue('#SpotAddress', '追加住所変更');
            $browser->scrollIntoView('#SpotTel1')->assertInputValue('#SpotTel1', '099');
            $browser->scrollIntoView('#SpotTel2')->assertInputValue('#SpotTel2', '1239');
            $browser->scrollIntoView('#SpotTel3')->assertInputValue('#SpotTel3', '4569');
            $browser->scrollIntoView('#SpotDetailFax')->assertInputValue('#SpotDetailFax', '0166-123-4569');
            $browser->scrollIntoView('#SpotDetailEmail')->assertInputValue('#SpotDetailEmail', 'add_edit@hoge.co.jp');
            $browser->scrollIntoView('#SpotDetailStaff')->assertInputValue('#SpotDetailStaff', '追加スタッフ変更');
            $browser->scrollIntoView('#SpotDetailCompanyName')->assertInputValue('#SpotDetailCompanyName', '追加運営会社変更');
            $browser->scrollIntoView('#SpotDetailCompanyStaff')->assertInputValue('#SpotDetailCompanyStaff', '追加運営スタッフ変更');
            $browser->scrollIntoView('#SpotMonthlyPriceMin')->assertSelected('#SpotIconItem_status_self', '3');
            $browser->assertSelected('#SpotIconItem_status_support', '3');
            $browser->assertSelected('#SpotIconItem_status_care', '3');
            $browser->assertSelected('#SpotIconItem_status_dementia', '3');
            $browser->assertSelected('#SpotIconItem_status_disability', '3');
            $browser->assertSelected('#SpotIconItem_status_nursing', '3');
            $browser->assertInputValue('#SpotMonthlyPriceMin', '111');
            $browser->assertInputValue('#SpotMonthlyPriceMax', '222');
            $browser->assertChecked('#SpotForCheckMonthly');
            $browser->assertInputValue('#SpotMoveinPriceMin', '333');
            $browser->assertInputValue('#SpotMoveinPriceMax', '444');
            $browser->assertChecked('#SpotForCheckMovein');
            $browser->assertSelected('#SpotPriceRange', '3');
            $browser->assertSelected('#SpotIconItem_privatespace_toilet', '3');
            $browser->assertSelected('#SpotIconItem_privatespace_washstand', '3');
            $browser->assertSelected('#SpotIconItem_privatespace_closet', '3');
            $browser->assertSelected('#SpotIconItem_privatespace_kitchen', '3');
            $browser->assertSelected('#SpotIconItem_privatespace_bath', '3');
            $browser->assertSelected('#SpotIconItem_privatespace_bed', '3');
            $browser->assertSelected('#SpotIconItem_privatespace_internet', '3');
            $browser->assertSelected('#SpotIconItem_nursing_infection', '3');
            $browser->assertSelected('#SpotIconItem_nursing_baloon', '3');
            $browser->assertSelected('#SpotIconItem_nursing_uc', '3');
            $browser->assertSelected('#SpotIconItem_nursing_insulin', '3');
            $browser->assertSelected('#SpotIconItem_nursing_gastrostomy', '3');
            $browser->assertSelected('#SpotIconItem_nursing_nn', '3');
            $browser->assertSelected('#SpotIconItem_nursing_stoma', '3');
            $browser->assertSelected('#SpotIconItem_nursing_dialysis', '3');
            $browser->assertSelected('#SpotIconItem_nursing_suction', '3');
            $browser->assertSelected('#SpotIconItem_nursing_injection', '3');
            $browser->assertSelected('#SpotIconItem_nursing_ivh', '3');
            $browser->assertSelected('#SpotIconItem_nursing_bedsores', '3');
            $browser->assertSelected('#SpotIconItem_nursing_home_oxygen', '3');
            $browser->assertSelected('#SpotIconItem_nursing_terminal', '3');
            $browser->assertSelected('#SpotIconItem_nursing_drag', '3');
            $browser->assertSelected('#SpotIconItem_care_eatingsupport', '3');
            $browser->assertSelected('#SpotIconItem_care_excretion', '3');
            $browser->assertSelected('#SpotIconItem_care_bathingsupport', '3');
            $browser->assertSelected('#SpotIconItem_care_specialbath', '3');
            $browser->assertSelected('#SpotIconItem_care_visitsupport', '3');
            $browser->assertSelected('#SpotIconItem_care_roomcleanup', '3');
            $browser->assertSelected('#SpotIconItem_care_shopping', '3');
            $browser->assertSelected('#SpotIconItem_care_money', '3');
            $browser->assertSelected('#SpotIconItem_care_medicine', '3');
            $browser->assertSelected('#SpotIconItem_care_hospitalsupport', '3');
            $browser->assertSelected('#SpotIconItem_other_hogo', '3');
            $browser->assertSelected('#SpotIconItem_other_pet', '3');
            $browser->assertSelected('#SpotIconItem_other_age', '3');
            $browser->assertSelected('#SpotIconItem_other_pare', '3');
            $browser->assertSelected('#SpotIconItem_other_trial', '3');
            $browser->scrollIntoView('#SpotPrice1')->assertInputValue('#SpotPrice1', '追加家賃変更');
            $browser->assertInputValue('#SpotPrice2', '追加管理費変更');
            $browser->assertInputValue('#SpotPrice3', '追加食費変更');
            $browser->assertInputValue('#SpotPrice4', '追加水道光熱費変更');
            $browser->assertInputValue('#SpotPrice5', '追加冬期暖房費変更');
            $browser->assertInputValue('#SpotPrice6', '追加その他変更');
            $browser->assertInputValue('#SpotRoomSize', '追加99畳変更');
            $browser->assertSelected('#SpotSpace', '3');
            $browser->assertInputValue('#SpotDetailRooms', '追加99室変更');
            $browser->assertInputValue('#SpotDetailNurses', '追加99人変更');
            $browser->assertInputValue('#SpotDetailNurseTime', '追加10時〜20時変更');
            $browser->assertInputValue('#SpotDetailStaffs', '追加99人変更');
            $browser->assertInputValue('#SpotHeading', '追加タイトル変更');
            $browser->assertInputValue('#SpotMessage', '追加メッセージ変更');
            $browser->assertInputValue('#SpotDetailIntroducer', '追加紹介者変更');
            $browser->assertInputValue('#SpotDetailFeature', '追加その他変更');
            $browser->assertInputValue('#SpotDetailComment', '追加メモ1変更');
            $browser->assertInputValue('#SpotDetailComment2', '追加メモ2変更');
            $browser->scrollIntoView('#SpotIsMeeting')->assertChecked('#SpotIsMeeting');
            $browser->scrollIntoView('#SpotIsBook')->assertChecked('#SpotIsBook');
            $browser->assertChecked('#SpotBook2');
            $browser->assertChecked('#SpotBook3');
            $browser->assertChecked('#SpotBook4');
            $browser->assertChecked('#SpotBook5');
            $browser->assertChecked('#SpotBook6');
            $browser->assertChecked('#SpotBook7');
            $browser->scrollIntoView('#SpotDisplay')->assertChecked('#SpotDisplay');
            $browser->scrollIntoView('#SpotPreview')->assertChecked('#SpotPreview');
            $browser->scrollIntoView('#SpotVacancy3')->assertRadioSelected('#SpotVacancy3', '1');
            $browser->scrollIntoView('#SpotDocument3')->assertRadioSelected('#SpotDocument3', '1');
            $browser->scrollIntoView('#SpotViewing3')->assertRadioSelected('#SpotViewing3', '1');
            $browser->scrollIntoView('#SpotTradeArea')->assertSelected('#SpotTradeArea', '3');
            $browser->scrollIntoView('#SpotSpotPlan')->assertSelected('#SpotSpotPlan', '2');
            $browser->scrollIntoView('#SpotLat')->assertInputValue('#SpotLat', '44.96281006321748');
            $browser->scrollIntoView('#SpotLng')->assertInputValue('#SpotLng', '143.95817790725756');

            // 削除とその後の動作確認
            $browser->type('#SpotDelete', 'spot_21');
            $browser->click('#DeleteSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('を削除しました');
            $browser->assertSee('20件がみつかりました');
            $browser->scrollIntoView('#SpotName20')->click('#SpotName20');
            $browser->assertSee('事業所20の編集ができます');
            $browser->scrollIntoView('#SpotSubmit')->click('#SpotSubmit');
            $browser->acceptDialog();
            $browser->pause(1000);
            $browser->assertSee('事業所20を変更しました');
        });
    }


}

