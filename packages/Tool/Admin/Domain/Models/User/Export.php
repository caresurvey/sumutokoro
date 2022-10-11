<?php

namespace Tool\Admin\Domain\Models\User;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Export implements FromCollection, WithHeadings, WithColumnWidths
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
            $result['enabled'] = ($value->enabled === 1) ? '有効' : '無効';
            $result['name'] = $value->name;
            $result['kana'] = $value->kana;
            $result['email'] = $value->email;
            $result['is_authenticated'] = ($value->is_authenticated === 1) ? '認証済み' : '未認証';
            $result['authenticated_date'] = $value->authenticated_date;
            $result['authenticated_msg'] = $value->authenticated_msg;
            $result['company'] = $value->company;
            $result['tel'] = $value->tel1 . '-' . $value->tel2 . '-' . $value->tel3;
            $result['fax'] = $value->fax;
            $result['zip'] = $value->zip1 . '-' . $value->zip2;
            $result['prefecture'] = $value->prefecture->name;
            $result['city'] = $value->city->name;
            $result['address'] = $value->prefecture->name . $value->address;
            $result['job_type'] = $value->job_type->name;
            $result['role'] = $value->role->name;
            $result['user_type'] = $value->user_type->name;
            $results[] = $result;
        }

        return new Collection($results);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 10,
            'C' => 25,
            'D' => 25,
            'E' => 40,
            'F' => 15,
            'G' => 20,
            'H' => 30,
            'I' => 40,
            'J' => 20,
            'K' => 20,
            'L' => 15,
            'M' => 15,
            'N' => 20,
            'O' => 30,
            'P' => 20,
            'Q' => 20,
            'R' => 20,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            '有効／無効',
            'お名前',
            'ふりがな',
            'メールアドレス',
            'ユーザー認証',
            '認証日時',
            '認証時のコメント',
            '所属している事業所や法人',
            '電話番号',
            'FAX',
            '郵便番号',
            '都道府県',
            '市町村',
            '住所',
            '職種',
            '権限',
            'ユーザータイプ',
        ];
    }
}
