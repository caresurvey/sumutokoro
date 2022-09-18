<?php

namespace Tool\User\Domain\Models\QueryBuilder;

/**
 * Class ListQuery
 * @package Tool\User\Domain\Models\QueryBuilder
 */
class ListQuery
{
    public function conditions(array $request, array $columns): array
    {
        // 初期化
        $results = [];

        // クエリと指定カラムを照らし合わせて、合致するものだけを入れる
        foreach($request as $key => $value) {
            foreach($columns as $column) {
                // 指定カラムと一致すれば、追加する
                if($key === $column) $results[$key] = $value;
            }
        }

        return $results;
    }

    /**
     * @return String
     */
    public function sort(array $request): String
    {
        // クエリパラメータに該当項目があったら更新
        if(!empty($request['sort'])) return (String)$request['sort'];

        // 該当項目がなければidを返す
        return 'id';
    }

    /**
     * @return String
     */
    public function direction(array $request): String
    {
        // クエリパラメータに該当項目があったら更新
        if(!empty($request['direction'])) return (String)$request['direction'];

        // 該当項目がなければascを返す
        return 'asc';
    }

    /**
     * @return Int
     */
    public function current(array $request): Int
    {
        // クエリパラメータに該当項目があったら更新
        if(!empty($request['page'])) return (String)$request['page'];

        // 該当項目がなければ1を返す
        return 1;
    }
}
