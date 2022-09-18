<?php

namespace Tool\Admin\Domain\Models\SpotPrice;

class StoreData
{
    private array $data;


    public function __construct(
        array $data
    )
    {
        $this->data = $data;
    }

    public function getFillData(int $spot_id, int $user_id): array
    {
        $results = [];
        foreach($this->data as $data) {
            $result = $data;
            $result['name'] = '';
            $result['spot_id'] = $spot_id;
            $result['user_id'] = $user_id;
            $results[] = $result;
        }

        return $results;
    }

}
