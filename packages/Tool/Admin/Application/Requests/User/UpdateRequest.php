<?php

namespace Tool\Admin\Application\Requests\User;

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
            'user.id' => 'required|numeric|min:1',
            'user.enabled' => 'required|numeric|between:0,1',
            'user.name' => 'required|string',
            'user.kana' => 'present|string',
            'user.zip1' => 'present|digits:3',
            'user.zip2' => 'present|digits:4',
            'user.address' => 'present|string',
            'user.tel1' => 'present|digits_between:2,5',
            'user.tel2' => 'present|digits_between:2,5',
            'user.tel3' => 'present|digits_between:2,5',
            'user.fax' => 'present|string',
            'user.email' => 'required|email|string',
            'user.is_authenticated' => 'required|numeric|between:0,1',
            'user.authenticated_msg' => 'present|string',
            'user.company' => 'present|string',
            'user.msg' => 'present|string',
            'user.city_id' => 'required|numeric|min:1',
            'user.job_type_id' => 'required|numeric|min:1',
            'user.prefecture_id' => 'required|numeric|min:1',
            'user.role_id' => 'required|numeric|min:1',
            'user.user_type_id' => 'required|numeric|min:1',
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
            'user.id.numeric' => ':attributeが正しくありません',
            'user.id.min' => ':attributeが正しくありません',
            'user.enabled.required' => ':attributeは必須です',
            'user.enabled.numeric' => ':attributeが正しくありません',
            'user.enabled.between' => ':attributeが正しくありません',
            'user.name.required' => ':attributeは必須です',
            'user.kana.present' => ':attributeは必須です',
            'user.zip1.present' => ':attributeは必須です',
            'user.zip1.digits' => ':attributeが正しくありません',
            'user.zip2.present' => ':attributeは必須です',
            'user.zip2.digits' => ':attributeが正しくありません',
            'user.address.present' => ':attributeは必須です',
            'user.tel1.present' => ':attributeは必須です',
            'user.tel1.digits_between' => ':attributeの桁数が正しくありません',
            'user.tel2.present' => ':attributeは必須です',
            'user.tel2.digits_between' => ':attributeの桁数が正しくありません',
            'user.tel3.present' => ':attributeは必須です',
            'user.tel3.digits_between' => ':attributeの桁数が正しくありません',
            'user.fax.present' => ':attributeは必須です',
            'user.email.required' => ':attributeは必須です',
            'user.email.email' => ':attributeの形式が違います',
            'user.is_authenticated.required' => ':attributeは必須です',
            'user.is_authenticated.numeric' => ':attributeが正しくありません',
            'user.is_authenticated.between' => ':attributeが正しくありません',
            'user.authenticated_msg.present' => ':attributeは必須です',
            'user.company.present' => ':attributeは必須です',
            'user.msg.present' => ':attributeは必須です',
            'user.city_id.required' => ':attributeは必須です',
            'user.city_id.numeric' => ':attributeが正しくありません',
            'user.city_id.min' => ':attributeが正しくありません',
            'user.job_type_id.required' => ':attributeは必須です',
            'user.job_type_id.numeric' => ':attributeが正しくありません',
            'user.job_type_id.min' => ':attributeが正しくありません',
            'user.prefecture_id.required' => ':attributeは必須です',
            'user.prefecture_id.numeric' => ':attributeが正しくありません',
            'user.prefecture_id.min' => ':attributeが正しくありません',
            'user.role_id.required' => ':attributeは必須です',
            'user.role_id.numeric' => ':attributeが正しくありません',
            'user.role_id.min' => ':attributeが正しくありません',
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
            'user.id' => 'ユーザーID',
            'user.enabled' => '有効',
            'user.name' => '名前',
            'user.kana' => 'ふりがな',
            'user.zip1' => '郵便番号1',
            'user.zip2' => '郵便番号2',
            'user.address' => '住所',
            'user.tel1' => '電話番号1',
            'user.tel2' => '電話番号2',
            'user.tel3' => '電話番号3',
            'user.fax' => 'FAX',
            'user.email' => 'メールアドレス',
            'user.is_authenticated' => 'ユーザー確認',
            'user.authenticated_msg' => 'ユーザー認証コメント',
            'user.company' => '所事業所属・法人',
            'user.msg' => '備考・コメント',
            'user.city_id' => '市町村',
            'user.job_type_id' => '職種',
            'user.prefecture_id' => '都道府県',
            'user.role_id' => '権限',
            'user.user_type_id' => 'ユーザータイプ',
        ];
    }
}

