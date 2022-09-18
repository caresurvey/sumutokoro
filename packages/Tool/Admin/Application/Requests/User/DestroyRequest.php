<?php

namespace Tool\Admin\Application\Requests\User;

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
            'user_delete.id' => 'required|numeric',
            'user_delete.code' => 'required|string',
            'user_delete.confirmation' => 'required|string|same:user_delete.code',
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
            'user_delete.id.required' => ':attributeは必須です',
            'user_delete.code.required' => ':attributeは必須です',
            'user_delete.confirmation.required' => ':attributeは必須です',
            'user_delete.confirmation.same' => ':attributeが一致しません',
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
            'user_delete.id' => '法人ID',
            'user_delete.code' => '削除コード',
            'user_delete.confirmation' => '削除コード確認',
        ];
    }
}

