<?php

namespace Tool\Admin\Application\Requests\Spot;

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
    public function rules()
    {
        return [
            'spot.id' => 'required|numeric|min:1',
            'spot.display' => 'required|numeric|between:0,1',
            'spot.preview' => 'required|numeric|between:0,1',
            'spot.name' => 'required|string',
            'spot.tel1' => 'present|digits_between:2,5',
            'spot.tel2' => 'present|digits_between:2,5',
            'spot.tel3' => 'present|digits_between:2,5',
            'spot.zip1' => 'present|digits:3',
            'spot.zip2' => 'present|digits:4',
            'spot.address' => 'present|string',
            'spot.vacancy' => 'required|numeric|between:1,5',
            'spot.document' => 'required|numeric|between:1,5',
            'spot.viewing' => 'required|numeric|between:1,5',
            'spot.is_book' => 'required|numeric|between:0,1',
            'spot.is_meeting' => 'required|numeric|between:0,1',
            'spot.heading' => 'present|string',
            'spot.message' => 'present|string',
            'spot.monthly_price_min' => 'required|numeric|min:0',
            'spot.monthly_price_max' => 'required|numeric|min:0',
            'spot.for_check_monthly' => 'required|numeric|between:0,1',
            'spot.movein_price_min' => 'required|numeric|min:0',
            'spot.movein_price_max' => 'required|numeric|min:0',
            'spot.for_check_movein' => 'required|numeric|between:0,1',
            'spot.is_selfpay' => 'required|numeric|between:0,1',
            'spot.room_size' => 'present|string',
            'spot.lat' => 'required|string',
            'spot.lng' => 'required|string',
            'spot.area_center_id' => 'required|numeric|min:1',
            'spot.category_id' => 'required|numeric|min:1',
            'spot.company_id' => 'required|numeric|min:1',
            'spot.city_id' => 'required|numeric|min:1',
            'spot.prefecture_id' => 'required|numeric|min:1',
            'spot.price_range_id' => 'required|numeric|min:1',
            'spot.space_id' => 'required|numeric|min:1',
            'spot.spot_plan_id' => 'required|numeric|min:1',
            'spot.trade_area_id' => 'required|numeric|min:1',
            //'spot.spot_detail.proarea' => 'present|string',
            //'spot.spot_detail.fax' => 'present|string',
            //'spot.spot_detail.email' => 'nullable|email',
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
            'spot.id.required' => ':attributeは必須です',
            'spot.id.numeric' => ':attributeが正しくありません',
            'spot.id.min' => ':attributeが正しくありません',
            'spot.display.required' => ':attributeは必須です',
            'spot.display.numeric' => ':attributeが正しくありません',
            'spot.display.between' => ':attributeが正しくありません',
            'spot.preview.required' => ':attributeは必須です',
            'spot.preview.numeric' => ':attributeが正しくありません',
            'spot.preview.between' => ':attributeが正しくありません',
            'spot.name.required' => ':attributeは必須です',
            'spot.longname.present' => ':attributeは必須です',
            'spot.zip1.present' => ':attributeは必須です',
            'spot.zip1.digits' => ':attributeが正しくありません',
            'spot.zip2.present' => ':attributeは必須です',
            'spot.zip2.digits' => ':attributeが正しくありません',
            'spot.address.present' => ':attributeは必須です',
            'spot.tel1.present' => ':attributeは必須です',
            'spot.tel1.digits_between' => ':attributeの桁数が正しくありません',
            'spot.tel2.present' => ':attributeは必須です',
            'spot.tel2.digits_between' => ':attributeの桁数が正しくありません',
            'spot.tel3.present' => ':attributeは必須です',
            'spot.tel3.digits_between' => ':attributeの桁数が正しくありません',
            'spot.vacancy.required' => ':attributeは必須です',
            'spot.vacancy.numeric' => ':attributeの形式が正しくありません',
            'spot.vacancy.between' => ':attributeの形式が正しくありません',
            'spot.document.required' => ':attributeは必須です',
            'spot.document.numeric' => ':attributeの形式が正しくありません',
            'spot.document.between' => ':attributeの形式が正しくありません',
            'spot.viewing.required' => ':attributeは必須です',
            'spot.viewing.numeric' => ':attributeの形式が正しくありません',
            'spot.viewing.between' => ':attributeの形式が正しくありません',
            'spot.is_book.required' => ':attributeは必須です',
            'spot.is_book.numeric' => ':attributeの形式が正しくありません',
            'spot.is_book.between' => ':attributeの形式が正しくありません',
            'spot.is_meeting.required' => ':attributeは必須です',
            'spot.is_meeting.numeric' => ':attributeの形式が正しくありません',
            'spot.is_meeting.between' => ':attributeの形式が正しくありません',
            'spot.heading.present' => ':attributeは必須です',
            'spot.message.present' => ':attributeは必須です',
            'spot.monthly_price_min.required' => ':attributeは必須です',
            'spot.monthly_price_min.numeric' => ':attributeの形式が正しくありません',
            'spot.monthly_price_min.min' => ':attributeの形式が正しくありません',
            'spot.monthly_price_max.required' => ':attributeは必須です',
            'spot.monthly_price_max.numeric' => ':attributeの形式が正しくありません',
            'spot.monthly_price_max.min' => ':attributeの形式が正しくありません',
            'spot.for_check_monthly.required' => ':attributeは必須です',
            'spot.for_check_monthly.numeric' => ':attributeが正しくありません',
            'spot.for_check_monthly.between' => ':attributeが正しくありません',
            'spot.movein_price_min.required' => ':attributeは必須です',
            'spot.movein_price_min.numeric' => ':attributeの形式が正しくありません',
            'spot.movein_price_min.min' => ':attributeの形式が正しくありません',
            'spot.movein_price_max.required' => ':attributeは必須です',
            'spot.movein_price_max.numeric' => ':attributeの形式が正しくありません',
            'spot.movein_price_max.min' => ':attributeの形式が正しくありません',
            'spot.for_check_movein.required' => ':attributeは必須です',
            'spot.for_check_movein.numeric' => ':attributeが正しくありません',
            'spot.for_check_movein.between' => ':attributeが正しくありません',
            'spot.is_selfpay.required' => ':attributeは必須です',
            'spot.is_selfpay.numeric' => ':attributeが正しくありません',
            'spot.is_selfpay.between' => ':attributeが正しくありません',
            'spot.room_size.present' => ':attributeは必須です',
            'spot.lat.required' => ':attributeは必須です',
            'spot.lng.required' => ':attributeは必須です',
            'spot.area_center_id.required' => ':attributeは必須です',
            'spot.category_id.required' => ':attributeは必須です',
            'spot.company_id.required' => ':attributeは必須です',
            'spot.city_id.required' => ':attributeは必須です',
            'spot.prefecture_id.required' => ':attributeは必須です',
            'spot.price_range_id.required' => ':attributeは必須です',
            'spot.space_id.required' => ':attributeは必須です',
            'spot.spot_plan_id.required' => ':attributeは必須です',
            'spot.trade_area_id.required' => ':attributeは必須です',
            //'spot.spot_detail.proarea.present' => ':attributeは必須です',
            //'spot.spot_detail.fax.present' => ':attributeは必須です',
            //'spot.spot_detail.email.present' => ':attributeは必須です',
            //'spot.spot_detail.email.email' => ':attributeを正しく入力して下さい',
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
            'spot.id' => '事業所ID',
            'spot.display' => '表示',
            'spot.preview' => 'プレビュー',
            'spot.name' => '事業所名',
            'spot.zip1' => '郵便番号1',
            'spot.zip2' => '郵便番号2',
            'spot.address' => '住所',
            'spot.tel1' => '電話番号1',
            'spot.tel2' => '電話番号2',
            'spot.tel3' => '電話番号3',
            'spot.vacancy' => '空き状況',
            'spot.document' => '資料',
            'spot.viewing' => '見学予約',
            'spot.is_book' => '冊子にのせるかどうか',
            'spot.is_meeting' => 'やりとり',
            'spot.heading' => '見出し',
            'spot.message' => 'メッセージ',
            'spot.monthly_price_min' => '月額最低費用',
            'spot.monthly_price_max' => '月額最高費用',
            'spot.for_check_monthly' => '月額費用の「〜」',
            'spot.movein_price_min' => '',
            'spot.movein_price_max' => '',
            'spot.for_check_movein' => '入居時費用の「〜」',
            'spot.is_selfpay' => '介護保険自己負担を含むかどうか',
            'spot.room_size' => '部屋サイズ',
            'spot.lat' => '緯度(LAT)',
            'spot.lng' => '経度(LNG)',
            'spot.area_center_id' => '地域包括エリア',
            'spot.category_id' => 'カテゴリ',
            'spot.company_id' => '法人',
            'spot.city_id' => '市町村',
            'spot.prefecture_id' => '都道府県',
            'spot.price_range_id' => '価格帯',
            'spot.space_id' => '個室内状況',
            'spot.spot_plan_id' => 'プラン',
            'spot.trade_area_id' => '商圏',
            //'spot.spot_detail.email' => 'Eメール',
            //'spot.spot_detail.proarea' => 'エリア名',
        ];
    }

    public function getSpotIconStatuses(): array
    {
        // データを取得
        $icons = parent::all(null)['spot']['spot_icon_item'];

        // 変数初期化
        $results = [];


        foreach ($icons as $id => $icon) {
            $result['id'] = $id;
            $result['spot_icon_type_id'] = (int)$icon['spot_icon_type_id'];
            $result['spot_icon_genre_id'] = (int)$icon['spot_icon_genre_id'];
            $results[] = $result;
        }

        // データを返す
        return $results;
    }

    public function getSpotIconGenreComments(): array
    {
        // データを取得
        $comments = parent::all(null)['spot']['spot_icon_genre_comment'];

        // 変数初期化
        $results = [];

        foreach ($comments as $id => $comment) {
            $result['id'] = $id;
            $result['comment'] = $comment;
            $results[] = $result;
        }

        // データを返す
        return $results;
    }

    public function getSpotPrices(): array
    {
        // データを取得
        $prices = parent::all(null)['spot']['spot_prices'];

        // 変数初期化
        $results = [];

        foreach ($prices as $id => $name) {
            $result['id'] = $id;
            $result['name'] = $name;
            $results[] = $result;
        }

        // データを返す
        return $results;
    }

    /**
     * 検索用キーワード自動作成
     * @param array $cities
     * @return string
     */
    public function getSearchWords(int $city_id, array $cities): string
    {
        $result = parent::all()['spot']['name'];
        if($city_id !== 1) $result .= $cities[$city_id];
        $result .= parent::all()['spot']['address'];

        return $result;
    }

    /**
     * @return int
     */
    public function returnId(): int
    {
        return $this->data()['spot']['id'];
    }
}

