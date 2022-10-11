<?php

namespace Tool\Admin\Domain\Models\Spot\Export;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportGeneral implements FromCollection, WithHeadings, WithColumnWidths
{
    private Collection $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return $this->makeData($this->data);
    }

    public function makeData(Collection $data): Collection
    {
        $results = [];
        foreach ($data as $value) {
            $result['id'] = $value->id;
            $result['display'] = ($value->display === 1) ? '表示' : '非表示';
            $result['preview'] = ($value->preview === 1) ? 'ON' : 'OFF';
            $result['name'] = $value->name;
            $result['longname'] = $value->longname;
            $result['kana'] = $value->spot_detail->kana;
            $result['zip'] = $value->zip1 . '-' . $value->zip2;
            $result['prefecture'] = $value->prefecture->name;
            $result['city'] = $value->city->name;
            $result['address'] = $value->prefecture->name . $value->address;
            $result['tel'] = $value->tel1 . '-' . $value->tel2 . '-' . $value->tel3;
            $result['fax'] = $value->spot_detail->fax;
            $result['email'] = $value->spot_detail->email;
            $result['is_book'] = ($value->is_book === 1) ? '掲載する' : '掲載しない';
            $result['vacancy'] = $this->getVacancyLabel($value->vacancy);
            $result['document'] = $this->getDocumentLabel($value->document);
            $result['viewing'] = $this->getViewingLabel($value->viewing);
            $result['is_meeting'] = ($value->is_meeting === 1) ? 'やりとり中' : 'やりとり無し';
            $result['monthly_price_min'] = $value->monthly_price_min;
            $result['monthly_price_max'] = $value->monthly_price_max;
            $result['movein_price_min'] = $value->movein_price_min;
            $result['movein_price_max'] = $value->movein_price_max;
            $result['is_selfpay'] = ($value->is_book === 1) ? '含む' : '含まない';
            $result['room_size'] = $value->room_size;
            $result['area_center'] = $value->area_center->name;
            $result['category'] = $value->category->name;
            $result['company'] = $value->spot_detail->company_name;
            $result['spot_plan'] = $value->spot_plan->name;
            $result['nurses'] = $value->spot_detail->nurses;
            $result['nurse_time'] = $value->spot_detail->nurse_time;
            $result['heading'] = $value->heading;
            $result['message'] = $value->message;
            $result['feature'] = $value->spot_detail->feature;
            $results[] = $result;
        }

        return new Collection($results);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 7,
            'C' => 7,
            'D' => 40,
            'E' => 60,
            'F' => 40,
            'G' => 15,
            'H' => 15,
            'I' => 20,
            'J' => 50,
            'K' => 20,
            'L' => 20,
            'M' => 50,
            'N' => 20,
            'O' => 20,
            'P' => 20,
            'Q' => 20,
            'R' => 20,
            'S' => 20,
            'T' => 20,
            'U' => 20,
            'V' => 20,
            'W' => 20,
            'X' => 20,
            'Y' => 50,
            'Z' => 40,
            'AA' => 30,
            'AB' => 30,
            'AC' => 30,
            'AD' => 40,
            'AE' => 60,
            'AF' => 60,
            'AG' => 60,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            '表示',
            'プレビュー',
            '事業所名',
            '正式名称',
            'ふりがな',
            '郵便番号',
            '都道府県',
            '市町村',
            '住所',
            '電話番号',
            'FAX',
            'メールアドレス',
            '冊子掲載',
            '空き状況',
            '施設資料',
            '施設見学',
            'やりとり',
            '月額最低料金',
            '月額最高料金',
            '入居時最低料金',
            '入居時最高料金',
            '介護保険自己負担',
            '部屋サイズ',
            '地域包括支援センター',
            '施設種類',
            '運営法人',
            'プラン',
            '看護師人数',
            '看護師滞在時間',
            '見出し',
            'コメント',
            '特徴',
        ];
    }

    public function getVacancyLabel(int $value): string
    {
        if($value === 2) return '空きあり';
        if($value === 3) return '空きなし';
        if($value === 4) return '要問合せ';

        return '指定なし';
    }

    public function getDocumentLabel(int $value): string
    {
        if($value === 2) return '資料あり';
        if($value === 3) return '資料なし';
        if($value === 4) return '要問合せ';

        return '指定なし';
    }

    public function getViewingLabel(int $value): string
    {
        if($value === 2) return '見学予約可';
        if($value === 3) return '見学予約不可';
        if($value === 4) return '要問合せ';

        return '指定なし';
    }
}
