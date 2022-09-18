<?php

namespace Tool\User\Infrastructure\Repositories\Domain\Eloquent;

use Tool\User\Domain\Models\SpotPrice\StoreData;
use Tool\User\Domain\Models\SpotPrice\SpotPriceRepository;
use Tool\User\Infrastructure\Eloquents\EloquentPriceGenre;
use DB;

class EloquentSpotPriceRepository implements SpotPriceRepository
{
    private EloquentPriceGenre $eloquentPriceGenre;

    public function __construct(EloquentPriceGenre $eloquentPriceGenre)
    {
        $this->eloquentPriceGenre = $eloquentPriceGenre;
    }

    public function makeStoreData(): StoreData
    {
        $price_genres = $this->eloquentPriceGenre->where('display', true)->pluck('name', 'id');
        $results = [];
        $i=1;
        foreach ($price_genres as $key => $spot_icon_item) {
            $result['name'] = '';
            $result['description'] = '';
            $result['ps'] = '';
            $result['reorder'] = $i;
            $result['price_genre_id'] = $key;
            $results[] = $result;
            $i++;
        }

        return new StoreData($results);
    }
}
