<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Eloquent;

use Tool\Admin\Domain\Models\SpotIconGenreComment\EditData;
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

    public function makeEditData(int $id, array $comments): EditData
    {
        $results = [];
        foreach($comments as $comment) {
            $results[$comment['spot_icon_genre']['serial']]['id'] = $comment['id'];
            $results[$comment['spot_icon_genre']['serial']]['comment'] = $comment['comment'];
            $results[$comment['spot_icon_genre']['serial']]['spot_icon_genre_id'] = $comment['spot_icon_genre_id'];
            $results[$comment['spot_icon_genre']['serial']]['spot_id'] = $comment['spot_id'];
            $results[$comment['spot_icon_genre']['serial']]['icon_genre_serial'] = $comment['spot_icon_genre']['serial'];
            $results[$comment['spot_icon_genre']['serial']]['icon_genre_name'] = $comment['spot_icon_genre']['name'];
        }
        return new EditData($results);
    }
}
