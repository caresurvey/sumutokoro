<?php

namespace Tool\User\Domain\Models\SpotIconStatus;

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
            $result['spot_icon_type_id'] = 1;
            $result['spot_icon_genre_id'] = 1;
            $result['spot_id'] = $spot_id;
            $result['user_id'] = $user_id;
            $results[] = $result;
        }

        return $results;
    }

}
