<?php

namespace Tool\Admin\Application\Requests\News;

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
    public function rules()
    {
        return [
            'news.name' => 'required|string',
        ];
    }

    /**
     * Set custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'news.name.required' => ':attributeは必須です',
        ];
    }

    /**
     * Set custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'news.name' => 'お知らせタイトル',
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

        // spotsテーブルデータ設定
        $results['news']['display'] = 0;
        $results['news']['preview'] = 1;
        $results['news']['body'] = '';
        $results['news']['more'] = '';
        $results['news']['url'] = '';

        // データを返す
        return $results;
    }
}

