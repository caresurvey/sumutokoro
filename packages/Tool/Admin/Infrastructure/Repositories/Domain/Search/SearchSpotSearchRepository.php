<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Search;

use Tool\Admin\Domain\Models\Spot\SpotSearch;
use Tool\Admin\Domain\Models\Spot\SpotSearchRepository;

class SearchSpotSearchRepository implements SpotSearchRepository
{
    public function makeSearch(array $request, string $query): SpotSearch
    {
        // 初期化
        $data = ['query' => $query];

        // 受け取ったパラメーターがあれば格納
        if($query !== '') {
            foreach($request['search'] as $key => $value) {
                $data[$key] = $value;
            }
        }

        // データをドメインオブジェクトにして返す
        return new SpotSearch($data);
    }
}
