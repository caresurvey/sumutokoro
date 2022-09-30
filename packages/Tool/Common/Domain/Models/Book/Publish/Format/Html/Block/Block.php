<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block;

/**
 * 冊子フォーマットの各ブロックを結合したブロック
 */
class Block extends BlockBase
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
    public function makeBlocks(array $spot): array
    {
        return [
            "number" => 51,
            "id" => $spot['id'],
            "area" => $spot['area_center']['book_label'],
            "category" => $this->categoryBlock->makeTag($spot['category']['serial']),
            "name" => $this->nameBlock->makeTag($spot['name']),
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
            "monthly_price" => $this->monthlyPriceBlock->makeTag($spot),
            "movein_price" => $this->moveinPriceBlock->makeTag($spot),
            "prices" => $this->pricesBlock->makeTag($spot['spot_prices']),
            "status_icons" => $this->statusIconsBlock->makeTag($spot['spot_icon_statuses']),
            "nursing_icons" => $this->nursingIconsBlock->makeTag($spot['spot_icon_statuses']),
            "care_icons" => $this->careIconsBlock->makeTag($spot['spot_icon_statuses']),
            "privatespace_icons" => $this->privatespaceBlock->makeTag($spot['spot_icon_statuses']),
            "other_icons" => $this->otherIconsBlock->makeTag($spot['spot_icon_statuses']),
            "photo" => $this->photoBlock->makeTag($spot),
            "frame" => $this->frameBlock->makeTag(),
        ];
    }
}
