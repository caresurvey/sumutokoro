<?php

namespace Tool\User\Application\Requests\Password;

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
            'user.id' => 'required|numeric',
            'user.password' => 'required|string|min:8',
            'user.password_confirm' => 'required|string|min:8|same:user.password',
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
            'user.id.required' => ':attributeは必須です',
            'user.password.required' => ':attributeは必須です',
            'user.password.min' => ':attributeは8文字以上で指定してください',
            'user.password_confirm.required' => ':attributeは必須です',
            'user.password_confirm.same' => ':attributeが一致していません',
            'user.password_confirm.min' => ':attributeは8文字以上で指定してください',
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
            'user.id' => 'ID',
            'user.password' => 'パスワード',
            'user.password_confirm' => 'パスワード確認',
        ];
    }
}

