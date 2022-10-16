<?php

namespace Tool\Admin\Domain\Models\Company;

class DecisionDelete
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function canDelete(): bool
    {
        if(!$this->existsSpots()) return false;

        return true;
    }

    public function existsUser(): bool
    {
        if(!empty($this->data['company']['user'])) return true;

        return false;
    }

    public function existsSpots(): bool
    {
        if($this->data['company']['spots_count'] > 0) return true;

        return false;
    }

    public function getUser(): string
    {
        if($this->existsUser()) return $this->data['company']['user'];

        return '';
    }

    public function getSpots(): array
    {
        return $this->data['company']['spots'];
    }

    public function getLinkDatas(): array
    {
        $results = [];
        if($this->existsSpots()) {
            foreach($this->getSpots() as $spot) {
                $result['link'] = 'spot/' . $spot['id'];
                $result['name'] = $spot['name'];
                $results[] = $result;
            }
        }

        return $results;
    }
}
