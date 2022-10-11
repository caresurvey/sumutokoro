<?php

namespace Tool\Admin\Domain\Models\Spot;

use Illuminate\Support\Collection;
use Tool\Admin\Infrastructure\Repositories\Domain\Publish\ElementarySpot;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\FormatConditions;

interface PublishSpotRepository
{
    public function getPublishSpots(array $area_centers): ElementarySpot;

    public function makePublishSpots(ElementarySpot $elementarySpots): array;

    public function pickupPublishSpots(array $allSpots, FormatConditions $conditions): array;

    public function splitSpotByQueue(array $spots): array;

}
