<?php

namespace Tool\Admin\Application\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class DestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'company_delete.id' => 'required|numeric',
            'company_delete.code' => 'required|string',
            'company_delete.confirmation' => 'required|string|same:company_delete.code',
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
            'company_delete.id.required' => ':attributeは必須です',
            'company_delete.code.required' => ':attributeは必須です',
            'company_delete.confirmation.required' => ':attributeは必須です',
            'company_delete.confirmation.same' => ':attributeが一致しません',
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
            'company_delete.id' => '法人ID',
            'company_delete.code' => '削除コード',
            'company_delete.confirmation' => '削除コード確認',
        ];
    }
}

