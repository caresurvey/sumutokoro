<?php

namespace Tool\Admin\Domain\Models\BookSection;

use Tool\Common\Domain\Models\Book\Publish\Format\Html\FormatConditions;

interface BookSectionRepository
{
    public function makePublishSpots(FormatConditions $conditions): PublishSpots;
}
