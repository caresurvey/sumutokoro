<?php

namespace Tool\Admin\Application\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'company.id' => 'required|numeric|min:1',
            'company.display' => 'required|numeric|between:0,1',
            'company.preview' => 'required|numeric|between:0,1',
            'company.name' => 'required|string',
            'company.longname' => 'present|string',
            'company.kana' => 'present|string',
            'company.email' => 'nullable|email',
            'company.zip1' => 'present|digits:3',
            'company.zip2' => 'present|digits:4',
            'company.address' => 'present|string',
            'company.tel1' => 'present|digits_between:2,5',
            'company.tel2' => 'present|digits_between:2,5',
            'company.tel3' => 'present|digits_between:2,5',
            'company.fax' => 'present|string',
            'company.lat' => 'required|string',
            'company.lng' => 'required|string',
            'company.msg' => 'present|string',
            'company.start' => 'present|string',
            'company.president' => 'present|string',
            'company.history' => 'present|string',
            'company.staff' => 'present|string',
            'company.city_id' => 'required|numeric|min:1',
            'company.prefecture_id' => 'required|numeric|min:1',
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
            'company.id.required' => ':attributeは必須です',
            'company.display.required' => ':attributeは必須です',
            'company.preview.required' => ':attributeは必須です',
            'company.name.required' => ':attributeは必須です',
            'company.longname.present' => ':attributeは必須です',
            'company.kana.present' => ':attributeは必須です',
            'company.email.email' => ':attributeの型があっていません',
            'company.zip1.present' => ':attributeは必須です',
            'company.zip1.digits' => ':attributeが正しくありません',
            'company.zip2.present' => ':attributeは必須です',
            'company.zip2.digits' => ':attributeが正しくありません',
            'company.address.present' => ':attributeは必須です',
            'company.tel1.present' => ':attributeは必須です',
            'company.tel2.present' => ':attributeは必須です',
            'company.tel3.present' => ':attributeは必須です',
            'company.tel1.numeric' => ':attributeは数字をいれてください',
            'company.tel2.numeric' => ':attributeは数字をいれてください',
            'company.tel3.numeric' => ':attributeは数字をいれてください',
            'company.tel1.between' => ':attributeの桁数が合いません',
            'company.tel2.between' => ':attributeの桁数が合いません',
            'company.tel3.between' => ':attributeの桁数が合いません',
            'company.fax.present' => ':attributeは必須です',
            'company.lat.present' => ':attributeは必須です',
            'company.lng.present' => ':attributeは必須です',
            'company.start.present' => ':attributeは必須です',
            'company.president.present' => ':attributeは必須です',
            'company.history.required' => ':attributeは必須です',
            'company.staff.required' => ':attributeは必須です',
            'company.msg.required' => ':attributeは必須です',
            'company.prefecture_id.required' => ':attributeは必須です',
            'company.city_id.required' => ':attributeは必須です',
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
            'company.id' => '法人ID',
            'company.display' => '表示',
            'company.preview' => 'プレビュー',
            'company.name' => '法人名',
            'company.longname' => '法人名フルネーム',
            'company.kana' => 'ふりがな',
            'company.zip1' => '郵便番号1',
            'company.zip2' => '郵便番号2',
            'company.address' => '住所',
            'company.tel1' => '電話番号1',
            'company.tel2' => '電話番号2',
            'company.tel3' => '電話番号3',
            'company.fax' => 'fax',
            'company.email' => 'メールアドレス',
            'company.lat' => '経度(LAT)',
            'company.lng' => '緯度(LNG',
            'company.start' => '設立日',
            'company.president' => '代表者',
            'company.history' => '沿革',
            'company.staff' => 'スタッフ数',
            'company.msg' => '備考',
            'company.prefecture' => '都道府県',
            'company.city_id' => '市町村',
        ];
    }

    /**
     * 検索用キーワード自動作成
     * @param int $city_id
     * @param array $cities
     * @return string
     */
    public function getSearchWords(int $city_id, array $cities): string
    {
        $result = parent::all()['company']['name'];
        $result .= $cities[$city_id];
        $result .= parent::all()['company']['address'];

        return $result;
    }
}

