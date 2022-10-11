<?php

namespace Tool\General\Infrastructure\Repositories\Domain\Search;

use Tool\General\Domain\Models\Spot\SpotSearch;
use Tool\General\Domain\Models\Spot\SpotSearchRepository;

class SearchSpotSearchRepository implements SpotSearchRepository
{
    public function makeSearch(array $request, string $query): SpotSearch
    {
        // 初期化
        $data = ['query' => $query];

        // 受け取ったパラメーターがあれば格納
        if(!empty($request['search'])) {
            foreach($request['search'] as $key => $value) {
                $data[$key] = $value;
            }
        }

        // データをドメインオブジェクトにして返す
        return new SpotSearch($data);
    }
}
