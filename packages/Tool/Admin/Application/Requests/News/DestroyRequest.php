<?php

namespace Tool\Admin\Application\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class DestroyRequest extends FormRequest
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
            'news_delete.id' => 'required|numeric',
            'news_delete.code' => 'required|string',
            'news_delete.confirmation' => 'required|string|same:news_delete.code',
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
            'news_delete.id.required' => ':attributeは必須です',
            'news_delete.code.required' => ':attributeは必須です',
            'news_delete.confirmation.required' => ':attributeは必須です',
            'news_delete.confirmation.same' => ':attributeが一致しません',
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
            'news_delete.id' => 'お知らせID',
            'news_delete.code' => '削除コード',
            'news_delete.confirmation' => '削除コード確認',
        ];
    }
}

