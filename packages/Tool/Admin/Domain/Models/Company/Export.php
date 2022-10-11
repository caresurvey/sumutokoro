<?php

namespace Tool\Admin\Domain\Models\Company;

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
            $result['name'] = $value->name;
            $result['longname'] = $value->longname;
            $result['kana'] = $value->kana;
            $result['email'] = $value->email;
            $result['tel'] = $value->tel1 . '-' . $value->tel2 . '-' . $value->tel3;
            $result['fax'] = $value->fax;
            $result['president'] = $value->president;
            $result['zip'] = $value->zip1 . '-' . $value->zip2;
            $result['prefecture'] = $value->prefecture->name;
            $result['city'] = $value->city->name;
            $result['address'] = $value->prefecture->name . $value->address;
            $results[] = $result;
        }

        return new Collection($results);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 25,
            'C' => 40,
            'D' => 30,
            'E' => 30,
            'F' => 20,
            'G' => 20,
            'H' => 15,
            'I' => 15,
            'J' => 20,
            'K' => 20,
            'L' => 80,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            '法人名',
            '正式名称',
            '法人名かな',
            'メールアドレス',
            '電話番号',
            'FAX',
            '代表者',
            '郵便番号',
            '都道府県',
            '市町村',
            '住所',
        ];
    }
}
