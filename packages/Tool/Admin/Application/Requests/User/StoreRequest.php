<?php

namespace Tool\Admin\Application\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

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
            'user.name' => 'required|string',
            'user.email' => 'required|email|string',
            'user.password' => 'required|string|min:8',
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
            'user.name.required' => ':attributeは必須です',
            'user.email.required' => ':attributeは必須です',
            'user.email.email' => ':attributeの形式がちがいます',
            'user.password.required' => ':attributeは必須です',
            'user.password.min' => ':attributeは8文字以上で入力してください',
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
            'user.name' => 'ユーザー名',
            'user.email' => 'メールアドレス',
            'user.password' => 'パスワード',
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
        $results['user']['enabled'] = 1;
        $results['user']['kana'] = '';
        $results['user']['zip1'] = '';
        $results['user']['zip2'] = '';
        $results['user']['address'] = '';
        $results['user']['tel1'] = '';
        $results['user']['tel2'] = '';
        $results['user']['tel3'] = '';
        $results['user']['fax'] = '';
        $results['user']['password'] = Hash::make($results['user']['password']);
        $results['user']['is_authenticated'] = 0;
        $results['user']['authenticated_msg'] = '';
        $results['user']['company'] = '';
        $results['user']['msg'] = '';
        $results['user']['lat'] = config('myapp.default_lat');
        $results['user']['lng'] = config('myapp.default_lng');
        $results['user']['reorder'] = 1;
        $results['user']['prefectuire_id'] = 1;
        $results['user']['city_id'] = 1;
        $results['user']['role_id'] = 1;
        $results['user']['trade_area_id'] = 1;
        $results['user']['user_type_id'] = 1;

        // データを返す
        return $results;
    }
}

