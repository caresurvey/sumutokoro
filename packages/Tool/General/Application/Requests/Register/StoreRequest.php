<?php

namespace Tool\General\Application\Requests\Register;

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
            'user.name' => 'required|string|max:255',
            'user.kana' => 'present|string',
            'user.tel1' => 'present|digits_between:2,5',
            'user.tel2' => 'present|digits_between:2,5',
            'user.tel3' => 'present|digits_between:2,5',
            'user.email' => 'required|email|string',
            'user.password' => 'required|string|min:8',
            'user.password_confirm' => 'required|string|min:8|same:user.password',
            'user.user_type_id' => 'required|numeric',
            'user.job_type_id' => 'required|numeric',
            'user.msg' => 'present|string',
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
            'user.kana.present' => ':attributeは必須です',
            'user.tel1.present' => ':attributeは必須です',
            'user.tel2.present' => ':attributeは必須です',
            'user.tel3.present' => ':attributeは必須です',
            'user.tel1.numeric' => ':attributeは数字をいれてください',
            'user.tel2.numeric' => ':attributeは数字をいれてください',
            'user.tel3.numeric' => ':attributeは数字をいれてください',
            'user.tel1.between' => ':attributeの桁数が合いません',
            'user.tel2.between' => ':attributeの桁数が合いません',
            'user.tel3.between' => ':attributeの桁数が合いません',
            'user.email.required' => ':attributeは必須です',
            'user.email.email' => ':attributeの形式がちがいます',
            'user.password.required' => ':attributeは必須です',
            'user.password.min' => ':attributeは8文字以上で指定してください',
            'user.password_confirm.required' => ':attributeは必須です',
            'user.password_confirm.same' => ':attributeが一致していません',
            'user.password_confirm.min' => ':attributeは8文字以上で指定してください',
            'user.user_type_id.required' => ':attributeは必須です',
            'user.job_type_id.required' => ':attributeは必須です',
            'user.msg.present' => ':attributeは必須です',
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
            'user.name' => 'お名前',
            'user.kana' => 'ふりがな',
            'user.address' => '住所',
            'user.tel1' => '電話番号1',
            'user.tel2' => '電話番号2',
            'user.tel3' => '電話番号3',
            'user.email' => 'メールアドレス',
            'user.password' => 'パスワード',
            'user.password_confirm' => 'パスワード確認',
            'user.user_type_id' => 'ユーザータイプ',
            'user.job_type_id' => '職種',
            'user.msg' => '備考',
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
        $results['user']['zip1'] = '';
        $results['user']['zip2'] = '';
        $results['user']['address'] = '';
        $results['user']['fax'] = '';
        $results['user']['is_authenticated'] = 0;
        $results['user']['authenticated_msg'] = '';
        $results['user']['lat'] = config('myapp.default_lat');
        $results['user']['lng'] = config('myapp.default_lng');
        $results['user']['password'] = Hash::make($results['user']['password']);
        $results['user']['reorder'] = 1;
        $results['user']['prefectuire_id'] = 1;
        $results['user']['city_id'] = 1;
        $results['user']['role_id'] = 3;
        $results['user']['trade_area_id'] = 1;

        // データを返す
        return $results;
    }
}

