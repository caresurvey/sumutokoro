<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Eloquent;

use Tool\Admin\Domain\Models\SpotIconGenreComment\StoreData;
use Tool\Admin\Domain\Models\SpotIconGenreComment\SpotIconGenreCommentRepository;
use Tool\Admin\Infrastructure\Eloquents\EloquentSpotIconGenre;

class EloquentSpotIconGenreCommentRepository implements SpotIconGenreCommentRepository
{
    private EloquentSpotIconGenre $eloquentSpotIconGenre;

    public function __construct(
        EloquentSpotIconGenre   $eloquentSpotIconGenre
    )
    {
        $this->eloquentSpotIconGenre = $eloquentSpotIconGenre;
    }

    public function makeStoreData(): StoreData
    {
        $spot_icon_genres = $this->eloquentSpotIconGenre->where('display', true)->where('serial', '<>', 'empty')->pluck('name', 'id');
        $results = [];
        foreach ($spot_icon_genres as $key => $spot_icon_genre) {
            $result['spot_icon_genre_id'] = $key;
            $results[] = $result;
        }

        return new StoreData($results);
    }
}
