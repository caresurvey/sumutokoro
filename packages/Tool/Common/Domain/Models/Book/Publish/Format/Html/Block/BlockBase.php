<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block;

class BlockBase
{
    public CareIconsBlock $careIconsBlock;
    public CategoryBlock $categoryBlock;
    public ContainerBlock $containerBlock;
    public FrameBlock $frameBlock;
    public MonthlyPriceBlock $monthlyPriceBlock;
    public MoveinPriceBlock $moveinPriceBlock;
    public NameBlock $nameBlock;
    public NursingIconsBlock $nursingIconsBlock;
    public OtherIconsBlock $otherIconsBlock;
    public PhotoBlock $photoBlock;
    public PricesBlock $pricesBlock;
    public PrivatespaceBlock $privatespaceBlock;
    public StatusIconsBlock $statusIconsBlock;

    public function __construct()
    {
        $this->categoryBlock = new CategoryBlock();
        $this->careIconsBlock = new CareIconsBlock();
        $this->containerBlock = new ContainerBlock();
        $this->frameBlock = new FrameBlock();
        $this->monthlyPriceBlock = new MonthlyPriceBlock();
        $this->moveinPriceBlock = new MoveinPriceBlock();
        $this->nameBlock = new NameBlock();
        $this->nursingIconsBlock = new NursingIconsBlock();
        $this->otherIconsBlock = new OtherIconsBlock();
        $this->photoBlock = new PhotoBlock();
        $this->pricesBlock = new PricesBlock();
        $this->privatespaceBlock = new PrivatespaceBlock();
        $this->statusIconsBlock = new StatusIconsBlock();
    }
}