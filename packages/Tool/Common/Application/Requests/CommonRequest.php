<?php

namespace Tool\Common\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommonRequest extends FormRequest
{
    /**
     * 特定カラムの連想配列の添字をvalueにする
     *
     * @return array
     */
    public function setVars(array $request): array
    {
        // 値がなかったら空を返す
        if (empty($request[0])) return [];

        // 初期化
        $results = [];


        // 連想配列の添字をvalueにする
        foreach ($request as $value) {
            $results[$value] = $value;
        }

        return $results;
    }
}
