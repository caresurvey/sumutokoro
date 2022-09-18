<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Search;

use Tool\Admin\Domain\Models\Company\CompanySearch;
use Tool\Admin\Domain\Models\Company\CompanySearchRepository;

class SearchCompanySearchRepository implements CompanySearchRepository
{
    public function makeSearch(array $request, string $query): CompanySearch
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
        return new CompanySearch($data);
    }
}
