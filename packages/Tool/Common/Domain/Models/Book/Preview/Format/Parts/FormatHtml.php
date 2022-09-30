<?php

namespace Tool\Common\Domain\Models\Book\Preview\Format\Parts;

class FormatHtml
{
    public function makeTag(): string
    {
        $html = <<< EOM
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
        EOM;

        return $html;
    }
}