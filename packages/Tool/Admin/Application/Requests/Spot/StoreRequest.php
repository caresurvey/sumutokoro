<?php

namespace Tool\Admin\Application\Requests\Spot;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'spot.name' => 'required|max:255',
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
            'spot.name.required' => ':attributeは必須です',
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
            'spot.name' => '事業所名',
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

        // spotsテーブルデータ設定
        $results['spot']['display'] = 0;
        $results['spot']['preview'] = 1;
        $results['spot']['longname'] = '';
        $results['spot']['zip1'] = '';
        $results['spot']['zip2'] = '';
        $results['spot']['address'] = '';
        $results['spot']['tel1'] = '';
        $results['spot']['tel2'] = '';
        $results['spot']['tel3'] = '';
        $results['spot']['is_meeting'] = 0;
        $results['spot']['heading'] = '';
        $results['spot']['message'] = '';
        $results['spot']['monthly_price_min'] = 0;
        $results['spot']['monthly_price_max'] = 0;
        $results['spot']['movein_price_min'] = 0;
        $results['spot']['movein_price_max'] = 0;
        $results['spot']['room_size'] = '';
        $results['spot']['lat'] = config('myapp.default_lat');
        $results['spot']['lng'] = config('myapp.default_lng');
        $results['spot']['search_words'] = '';

        // spot_detailsテーブルデータ設定
        $results['spot']['spot_detail']['kana'] = '';
        $results['spot']['spot_detail']['subname'] = '';
        $results['spot']['spot_detail']['email'] = '';
        $results['spot']['spot_detail']['fax'] = '';
        $results['spot']['spot_detail']['rooms'] = '';
        $results['spot']['spot_detail']['staff'] = '';
        $results['spot']['spot_detail']['staffs'] = '';
        $results['spot']['spot_detail']['staff_age'] = '';
        $results['spot']['spot_detail']['nurses'] = '';
        $results['spot']['spot_detail']['nurse_time'] = '';
        $results['spot']['spot_detail']['build_start'] = '';
        $results['spot']['spot_detail']['open_start'] = '';
        $results['spot']['spot_detail']['website'] = '';
        $results['spot']['spot_detail']['introducer'] = '';
        $results['spot']['spot_detail']['phone'] = '';
        $results['spot']['spot_detail']['reserved_phone'] = '';
        $results['spot']['spot_detail']['feature'] = '';
        $results['spot']['spot_detail']['comment'] = '';
        $results['spot']['spot_detail']['comment2'] = '';
        $results['spot']['spot_detail']['company_name'] = '';
        $results['spot']['spot_detail']['company_staff'] = '';
        $results['spot']['spot_detail']['proarea'] = '';

        // データを返す
        return $results;
    }

    /**
     * 検索用キーワード自動作成
     * @return string
     */
    public function getSearchWords(): string
    {
        return parent::all()['spot']['name'];
    }
}

