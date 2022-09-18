<?php

namespace Tool\Admin\Application\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'news.id' => 'required|numeric|min:1',
            'news.display' => 'required|numeric|between:0,1',
            'news.preview' => 'required|numeric|between:0,1',
            'news.name' => 'required|string',
            'news.body' => 'present|string',
            'news.url' => 'present|string',
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
            'news.id.required' => ':attributeは必須です',
            'news.id.numeric' => ':attributeが正しくありません',
            'news.id.min' => ':attributeが正しくありません',
            'news.display.required' => ':attributeは必須です',
            'news.display.numeric' => ':attributeが正しくありません',
            'news.display.between' => ':attributeが正しくありません',
            'news.preview.required' => ':attributeは必須です',
            'news.preview.numeric' => ':attributeが正しくありません',
            'news.preview.between' => ':attributeが正しくありません',
            'news.name.required' => ':attributeは必須です',
            'news.body.present' => ':attributeは必須です',
            'news.url.present' => ':attributeは必須です',
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
            'news.id' => '記事ID',
            'news.display' => '表示',
            'news.preview' => 'プレビュー',
            'news.name' => '記事名',
            'news.body' => '本文',
            'news.url' => 'URL',
        ];
    }
}

