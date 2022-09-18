<?php

namespace Tool\Admin\Application\Requests\Spot;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
        ];
    }

    public function getSearched(): array
    {
        return [
            'city' => $this->getCity(),
            'keyword' => $this->getKeyword(),
        ];
    }

    public function existsCategory(): bool
    {
        if(empty(parent::all()['category'])) return false;
        if(parent::all()['category'] === '') return false;
        if(parent::all()['category'] === 1) return false;
        if(parent::all()['category'] === '1') return false;

        return true;
    }

    public function getCategory(): int
    {
        if(!$this->existsCategory()) return 1;
        return (int)parent::all()['category'];
    }

    public function existsCity(): bool
    {
        if(empty(parent::all()['city'])) return false;
        if(parent::all()['city'] === '') return false;
        if(parent::all()['city'] === 1) return false;
        if(parent::all()['city'] === '1') return false;

        return true;
    }

    public function getCity(): int
    {
        if(!$this->existsCity()) return 1;
        return (int)parent::all()['city'];
    }

    public function existsKeyword(): bool
    {
        if(empty(parent::all()['keyword'])) return false;
        if(parent::all()['keyword'] === '') return false;

        return true;
    }

    public function getKeyword(): string
    {
        if(!$this->existsKeyword()) return '';
        return parent::all()['keyword'];
    }
}
