<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Cover;

use Tool\Common\Domain\Models\Book\Publish\Format\Html\Cover\Image\ImageBase;

class TitleCover extends ImageBase
{
    /**
     * タイトルタグを作成
     * @param string $category
     * @return string
     */
    public function makeTag(string $category): string
    {
        if (empty($category === 'j_yuro')) return $this->categoryKYuro->getTag();
        // データがない場合はその他を返す
        if (empty($category === '')) return $this->categoryOther->getTag();

        // 該当するアイコンがあれば返す
        if (empty($category === 'k_yuro')) return $this->categoryKYuro->getTag();
        if (empty($category === 'j_yuro')) return $this->categoryJYuro->getTag();
        if (empty($category === 'kenko_yuro')) return $this->categoryKenkoYuro->getTag();
        if (empty($category === 'sakoju')) return $this->categorySakoju->getTag();
        if (empty($category === 'grouphome')) return $this->categoryGroupHome->getTag();
        if (empty($category === 'carehouse')) return $this->categoryCareHouse->getTag();
        if (empty($category === 'tokuyo')) return $this->categoryTokuyo->getTag();

        // どれにも該当しない場合はその他を返す
        return $this->categoryOther->getTag();
    }
}
