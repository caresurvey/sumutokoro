<?php

namespace Tool\Common\Domain\Models\Book\Preview\Format;

class Format extends Base
{
    public function __construct()
    {
        // 親クラスのコンストラクタ呼び出し
        parent::__construct();
    }

    public function makeData(array $spot): array
    {
        return [
            "area" => $spot['area_center']['name'],
            "category" => $spot['category']['book_label'],
            "id" => $spot['id'],
            "name" => $this->name->makeTag($spot['name']),
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
            "monthly_price" => $this->monthlyPrice->makeTag($spot),
            "movein_price" => $this->moveinPrice->makeTag($spot),
            "prices" => $this->prices->makeTag($spot['spot_prices']),
            "status_icons" => $this->statusIcons->makeTag($spot['spot_icon_statuses']),
            "nursing_icons" => $this->nursingIcons->makeTag($spot['spot_icon_statuses']),
            "care_icons" => $this->careIcons->makeTag($spot['spot_icon_statuses']),
            "privatespace_icons" => $this->privatespace->makeTag($spot['spot_icon_statuses']),
            "other_icons" => $this->otherIcons->makeTag($spot['spot_icon_statuses']),
            "photo" => $this->photo->makeTag($spot),
        ];
    }
}
