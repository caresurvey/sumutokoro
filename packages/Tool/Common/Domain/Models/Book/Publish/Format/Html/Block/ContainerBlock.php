<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block;

/**
 * フォーマット1つ分のHTMLテンプレート
 * データ置き換え前
 */
class ContainerBlock
{
    public function getTag(): string
    {
        $tag = '
        <div class="b-container">
          <div class="b-number">%%number%%</div>
          <div class="b-category">%%category%%</div>
          <div class="b-area">%%area%%</div>
          <div class="b-name">%%name%%</div>
          <div class="b-address">%%address%%</div>
          <div class="b-tel">%%tel%%</div>
          <div class="b-statusIcons">%%status_icons%%</div>
          <div class="b-monthly_price">%%monthly_price%%</div>
          <div class="b-movein_price">%%movein_price%%</div>
          <div class="b-otherIcons">%%other_icons%%</div>
          <img src="https://sumutokoro.com/qr/?d=https://sumutokoro.com/qr/jump/?id=%%id%%&s=10&e=L&t=J" class="b-qr">
          <div class="b-photo">%%photo%%</div>
          <div class="b-prices">%%prices%%</div>
          <div class="b-room_size">%%room_size%%</div>
          <div class="b-rooms">%%rooms%%</div>
          <div class="b-privatespaceIcons">%%privatespace_icons%%</div>
          <div class="b-nursing_time">看護師在勤時間／%%nurse_time%%</div>　
          <div class="b-nursing_num">看護師人数／%%nurses%%</div>
          <div class="b-nursingIcons">%%nursing_icons%%</div>
          <div class="b-careIcons">%%care_icons%%</div>
          <div class="b-company">%%company%%</div>
          <div class="b-staffs">%%staffs%%</div>
          <div class="b-comment">
            <div class="b-commentHeading">%%heading%%</div>
            <div class="b-commentDescription">%%message%%</div>
          </div>
          <div class="b-frame">%%frame%%</div>
        </div>';

        return $tag;
    }
}