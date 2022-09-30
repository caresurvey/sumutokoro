<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Cover;

/**
 * 冊子フォーマットの扉パーツを結合したブロック
 */
class Cover extends CoverBase
{
    public function __construct()
    {
        // 親クラスのコンストラクタ呼び出し
        parent::__construct();
    }

    /**
     * 結合ブロックを作成
     * @param array $spot 事業所データ1件分
     * @return array 配列
     */
    public function makeCovers(array $spot): array
    {
        return [
            "number" => 51,
            "id" => $spot['id'],
            "area" => $spot['area_center']['book_label'],
            "category" => $this->categoryCover->makeTag($spot['category']['serial']),
            "name" => $this->nameCover->makeTag($spot['name']),
            "address" => $spot['city']['name'] . $spot['address'],
            "tel" => $spot['tel1'] . "-" . $spot['tel2'] . "-" . $spot['tel3'],
            "category_id" => $spot['category_id'],
            "nurse_time" => $spot['spot_detail']['nurse_time'],
            "nurses" => $spot['spot_detail']['nurses'],
            "heading" => $spot['heading'],
            "message" => $spot['message'],
            "company" => $spot['spot_detail']['company_name'],
            "staffs" => $spot['spot_detail']['staffs'],
            "room_size" => $spot['room_size'],
            "rooms" => $spot['spot_detail']['rooms'],
            "monthly_price" => $this->monthlyPriceCover->makeTag($spot),
            "movein_price" => $this->moveinPriceCover->makeTag($spot),
            "prices" => $this->pricesCover->makeTag($spot['spot_prices']),
            "status_icons" => $this->statusIconsCover->makeTag($spot['spot_icon_statuses']),
            "nursing_icons" => $this->nursingIconsCover->makeTag($spot['spot_icon_statuses']),
            "care_icons" => $this->careIconsCover->makeTag($spot['spot_icon_statuses']),
            "privatespace_icons" => $this->privatespaceCover->makeTag($spot['spot_icon_statuses']),
            "other_icons" => $this->otherIconsCover->makeTag($spot['spot_icon_statuses']),
            "photo" => $this->photoCover->makeTag($spot),
            "frame" => $this->frameCover->makeTag(),
        ];
    }
}
