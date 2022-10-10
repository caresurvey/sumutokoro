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
            $result['name'] = $value->name;
            $result['zip'] = $value->zip1 . '-' . $value->zip2;
            $result['tel'] = $value->tel1 . '-' . $value->tel2 . '-' . $value->tel3;
            $result['fax'] = $value->fax;
            $result['email'] = $value->email;
            $results[] = $result;
        }

        return new Collection($results);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 40,
            'C' => 10,
            'D' => 15,
            'E' => 15,
            'F' => 30,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            '名前',
            '郵便番号',
            '電話番号',
            'FAX',
            'メールアドレス',
        ];
    }
}
