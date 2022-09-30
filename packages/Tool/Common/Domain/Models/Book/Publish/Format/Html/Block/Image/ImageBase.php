<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block\Image;

/**
 * Image基底クラス
 *
 */
class ImageBase
{
    public CategoryJYuro $categoryJYuro;
    public CategoryKYuro $categoryKYuro;
    public CategoryKenkoYuro $categoryKenkoYuro;
    public CategorySakoju $categorySakoju;
    public CategoryGroupHome $categoryGroupHome;
    public CategoryCareHouse $categoryCareHouse;
    public CategoryTokuyo $categoryTokuyo;
    public CategoryRouken $categoryRouken;
    public CategoryYougo $categoryYougo;
    public CategoryOther $categoryOther;
    public CareIcon1 $careIcon1;
    public CareIcon2 $careIcon2;
    public CareIcon3 $careIcon3;
    public CareIcon4 $careIcon4;
    public CareIcon5 $careIcon5;
    public CareIcon6 $careIcon6;
    public CareIcon7 $careIcon7;
    public CareIcon8 $careIcon8;
    public CareIcon9 $careIcon9;
    public CareIcon10 $careIcon10;
    public OtherIcon1 $otherIcon1;
    public OtherIcon2 $otherIcon2;
    public OtherIcon3 $otherIcon3;
    public OtherIcon4 $otherIcon4;
    public OtherIcon5 $otherIcon5;
    public TypeEmpty $typeEmpty;
    public TypeCross $typeCross;
    public TypeTriangle $typeTriangle;
    public TypeCircle $typeCircle;
    public TypeDoubleCircle $typeDoubleCircle;
    public Frame $frame;
    public string $photoPath;

    public function __construct()
    {
        $this->categoryJYuro = new CategoryJYuro();
        $this->categoryKYuro = new CategoryKYuro();
        $this->categoryKenkoYuro = new CategoryKenkoYuro();
        $this->categorySakoju = new CategorySakoju();
        $this->categoryGroupHome = new CategoryGroupHome();
        $this->categoryCareHouse = new CategoryCareHouse();
        $this->categoryTokuyo = new CategoryTokuyo();
        $this->categoryRouken = new CategoryRouken();
        $this->categoryYougo = new CategoryYougo();
        $this->categoryOther = new CategoryOther();
        $this->careIcon1 = new CareIcon1();
        $this->careIcon2 = new CareIcon2();
        $this->careIcon3 = new CareIcon3();
        $this->careIcon4 = new CareIcon4();
        $this->careIcon5 = new CareIcon5();
        $this->careIcon6 = new CareIcon6();
        $this->careIcon7 = new CareIcon7();
        $this->careIcon8 = new CareIcon8();
        $this->careIcon9 = new CareIcon9();
        $this->careIcon10 = new CareIcon10();
        $this->otherIcon1 = new OtherIcon1();
        $this->otherIcon2 = new OtherIcon2();
        $this->otherIcon3 = new OtherIcon3();
        $this->otherIcon4 = new OtherIcon4();
        $this->otherIcon5 = new OtherIcon5();
        $this->typeEmpty = new TypeEmpty();
        $this->typeCross = new TypeCross();
        $this->typeTriangle = new TypeTriangle();
        $this->typeCircle = new TypeCircle();
        $this->typeDoubleCircle = new TypeDoubleCircle();
        $this->frame = new Frame();
        $this->photoPath = storage_path('app') . '/photos';

    }

    /**
     * 該当する介護アイコンを判定する
     * @param string $serial
     * @return string
     */
    public function findCareIconImage(string $serial): string
    {
        if ($serial === 'care_eatingsupport') return $this->careIcon1->getTag();
        if ($serial === 'care_excretion') return $this->careIcon2->getTag();
        if ($serial === 'care_bathingsupport') return $this->careIcon3->getTag();
        if ($serial === 'care_specialbath') return $this->careIcon4->getTag();
        if ($serial === 'care_visitsupport') return $this->careIcon5->getTag();
        if ($serial === 'care_roomcleanup') return $this->careIcon6->getTag();
        if ($serial === 'care_shopping') return $this->careIcon7->getTag();
        if ($serial === 'care_money') return $this->careIcon8->getTag();
        if ($serial === 'care_medicine') return $this->careIcon9->getTag();
        if ($serial === 'care_hospitalsupport') return $this->careIcon10->getTag();

        // どれにも該当しなければ空文字を返す
        return '';
    }

    /**
     * 該当するその他アイコンを判定する
     * @param string $serial
     * @return string
     */
    public function findOtherIconImage(string $serial): string
    {
        if ($serial === 'other_hogo') return $this->otherIcon1->getTag();
        if ($serial === 'other_pet') return $this->otherIcon2->getTag();
        if ($serial === 'other_age') return $this->otherIcon3->getTag();
        if ($serial === 'other_pare') return $this->otherIcon4->getTag();
        if ($serial === 'other_trial') return $this->otherIcon5->getTag();

        // どれにも該当しなければ空文字を返す
        return '';
    }

    /**
     * 該当するタイプを判定する（-,×,△,○,◎）
     * @return string
     */
    public function findTypeImage(string $type): string
    {
        // 「×」を返す
        if ($type === 'cross') return $this->typeCross->getTag();

        // 「△」を返す
        if ($type === 'triangle') return $this->typeTriangle->getTag();

        // 「○」を返す
        if ($type === 'circle') return $this->typeCircle->getTag();

        // 「◎」を返す
        if ($type === 'double_circle') return $this->typeDoubleCircle->getTag();

        // 上記で該当がなければ「-」を返す
        return $this->typeEmpty->getTag();
    }
}