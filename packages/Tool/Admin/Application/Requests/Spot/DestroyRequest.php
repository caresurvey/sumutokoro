<?php

namespace Tool\Admin\Application\Requests\Spot;

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
            'spot_delete.id' => 'required|numeric|min:1',
            'spot_delete.code' => 'required|string',
            'spot_delete.confirmation' => 'required|string|same:spot_delete.code',
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
            'spot_delete.id.required' => ':attributeは必須です',
            'spot_delete.code.required' => ':attributeは必須です',
            'spot_delete.confirmation.required' => ':attributeは必須です',
            'spot_delete.confirmation.same' => ':attributeが一致しません',
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
            'spot_delete.id' => '法人ID',
            'spot_delete.code' => '削除コード',
            'spot_delete.confirmation' => '削除コード確認',
        ];
    }
}

