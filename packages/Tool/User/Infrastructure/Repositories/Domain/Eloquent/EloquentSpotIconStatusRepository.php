<?php

namespace Tool\User\Infrastructure\Repositories\Domain\Eloquent;

use Tool\User\Domain\Models\SpotIconStatus\StoreData;
use Tool\User\Domain\Models\SpotIconStatus\SpotIconStatusRepository;
use Tool\User\Infrastructure\Eloquents\EloquentSpotIconItem;

class EloquentSpotIconStatusRepository implements SpotIconStatusRepository
{
    private EloquentSpotIconItem $eloquentSpotIconItem;

    public function __construct(
        EloquentSpotIconItem   $eloquentSpotIconItem,
    )
    {
        $this->eloquentSpotIconItem = $eloquentSpotIconItem;
    }

    public function makeStoreData(): StoreData
    {
        $spot_icon_items = $this->eloquentSpotIconItem->where('display', true)->where('serial', '<>', 'empty')->pluck('name', 'id');
        $results = [];
        foreach ($spot_icon_items as $key => $spot_icon_item) {
            $result['spot_icon_item_id'] = $key;
            $results[] = $result;
        }

        return new StoreData($results);
    }
}
