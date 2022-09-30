<?php

namespace Tool\Common\Domain\Models\Book\Preview\Parts;

class ListHtmlTag
{
    public function getTemplate(): string
    {
        $html = <<< EOM
        <!DOCTYPE html>
        <html lang="ja">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="robots" content="noindex,nofollow">
          <meta name="robots" content="noarchive">
          <link href="https://fonts.googleapis.com/earlyaccess/roundedmplus1c.css" rel="stylesheet"/>
          <link href="https://fonts.googleapis.com/css?family=Quicksand:700&text=0123456789" rel="stylesheet">
          <title>プレビュー</title>      
          <style>
            %%css%%
          </style>  
        </head>
        
        <body>
        <div class="bp-paper__container">
            <div class="bp-paper__number">%%id%%</div>
            <div class="bp-paper__makeDay">%%makeDay%%</div>
            <div class="bp-paper__limitDay">%%limitDay%%</div>

            <div class="bp-container">
              <div class="bp-number">%%number%%</div>
              <div class="bp-categoryWrapper">
                <div class="bp-categoryInner">
                  <div class="bp-category">%%category%%</div>
                </div>
              </div>
              <div class="bp-area">
                <span>%%area%%</span>
              </div>
              <div class="bp-titWrapper">
                <div class="bp-tit"><table><tr><td>%%name%%</td></tr></table></div></div>
              <div class="bp-address">%%address%%</div>
              <div
                class="bp-tel">%%tel%%</div>
              <div class="bp-statusWrapper">
                <div class="bp-statusInner">
                  %%status_icons%%
                </div>
              </div>
              <img
                src="https://sumutokoro.com/qr/?d=https://sumutokoro.com/qr/jump/?id=%%id%%&s=10&e=L&t=J"
                class="bp-qr">
              <div class="bp-otherWrapper">
                <div class="bp-otherInner">
                  %%other_icons%%
                </div>
              </div>
              <div class="bp-monthly">
                %%monthly_price%%
              </div>
              <div class="bp-movein">
                %%movein_price%%
              </div>

              <div class="bp-price">
                %%prices%%
              </div>
              <div class="bp-roomSize">%%room_size%%</div>
              <div class="bp-roomNum">%%rooms%%</div>
              <div class="bp-roomPrivatespace">%%privatespace_icons%%</div>
              <div class="bp-photo">%%photo%%</div>
              <div class="bp-nursingArea">
                <div class="bp-nursingtime">
                  看護師在勤時間／%%nurse_time%%
                </div>　
                <div class="bp-nursingnum">看護師人数／%%nurses%%</div>
              </div>
              <div class="bp-nursingIconWrapper">
                <div class="bp-nursingIconInner">
                  %%nursing_icons%%
                </div>
              </div>
              <div class="bp-careIconWrapper">
                <div class="bp-careIconInner">
                  %%care_icons%%
                </div>
              </div>
              <div class="bp-company">
                <table><tr><td>%%company%%</td></tr></table>
              </div>
              <div class="bp-staff">%%staffs%%</div>
              <div class="bp-comment">
                <p class="bp-comment__heading">%%heading%%</p>
                <p class="bp-comment__description">%%message%%</p>
              </div>

            </div>

            <img src="%%imgPath%%/format/frame.png?cache=%%cacheid%%" class="bp-paper__formatFrame">
            <img src="%%imgPath%%/frame/paper_frame.png?cache=%%cacheid%%" class="bp-paper__paperFrame">
        </div>
        EOM;

        return $html;
    }
}