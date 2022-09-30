<?php

namespace Tool\Admin\Domain\Models\Spot;

use Illuminate\Support\Collection;
use Tool\Common\Domain\Models\Book\Publish\Format\Html\FormatConditions;

interface PublishSpotRepository
{
    public function makePublishSpots(FormatConditions $conditions): array;
}
