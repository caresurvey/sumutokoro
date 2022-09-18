<?php

namespace Tool\Admin\Application\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'company.name' => 'required|string|max:255',
        ];
    }

    /**
     * Set custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'company.name.required' => ':attributeは必須です',
        ];
    }

    /**
     * Set custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'company.name' => '法人名',
        ];
    }

    /**
     * ポストデータを返す
     * @return array
     */
    public function data(): array
    {
        // 変数初期化
        $results = parent::all(null);

        // 初期値を含めてデータ設定
        $results['company']['display'] = 0;
        $results['company']['preview'] = 1;
        $results['company']['longname'] = '';
        $results['company']['kana'] = '';
        $results['company']['email'] = '';
        $results['company']['zip1'] = '';
        $results['company']['zip2'] = '';
        $results['company']['address'] = '';
        $results['company']['tel1'] = '';
        $results['company']['tel2'] = '';
        $results['company']['tel3'] = '';
        $results['company']['fax'] = '';
        $results['company']['lat'] = config('myapp.default_lat');
        $results['company']['lng'] = config('myapp.default_lng');
        $results['company']['search_words'] = '';
        $results['company']['msg'] = '';
        $results['company']['start'] = '';
        $results['company']['president'] = '';
        $results['company']['history'] = '';
        $results['company']['capital'] = '';
        $results['company']['staff'] = '';
        $results['company']['area_branch_id'] = 1;
        $results['company']['prefecture_id'] = 1;
        $results['company']['city_id'] = 1;
        $results['company']['trade_area_id'] = 1;

        // データを返す
        return $results;
    }

    /**
     * 検索用キーワード自動作成
     * @return string
     */
    public function getSearchWords(): string
    {
        return parent::all()['company']['name'];
    }
}

