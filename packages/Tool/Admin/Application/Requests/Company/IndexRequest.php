<?php

namespace Tool\Admin\Application\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
        ];
    }

    public function data(): array
    {
        return parent::all();
    }
}
