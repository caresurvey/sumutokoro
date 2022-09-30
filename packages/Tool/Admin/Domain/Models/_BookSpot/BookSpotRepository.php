<?php

namespace Tool\Admin\Domain\Models\BookSpot;

use Tool\Common\Domain\Models\Book\Publish\Format\Html\FormatConditions;

interface BookSpotRepository
{
    public function makePublishSpots(FormatConditions $conditions): PublishSpots;
}
