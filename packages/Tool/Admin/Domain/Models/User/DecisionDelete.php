<?php

namespace Tool\Admin\Domain\Models\User;

class DecisionDelete
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function canDelete(): bool
    {
        // システム管理者権限は消せない
        if($this->isRootUser()) return false;

        // 対象ユーザーと関連の在るデータがあれば許可しない
        if($this->existsSpots() || $this->existsCompanies()) return false;

        return true;
    }

    /**
     * 管理者かどうか
     * @return bool
     */
    public function isRootUser(): bool
    {
        if($this->data['user']['role_id'] === 1) return true;

        return false;
    }

    public function existsCompanies(): bool
    {
        if($this->data['user']['companies_count'] > 0) return true;

        return false;
    }

    public function existsNews(): bool
    {
        if($this->data['user']['news_count'] > 0) return true;

        return false;
    }

    public function existsSpots(): bool
    {
        if($this->data['user']['spots_count'] > 0) return true;

        return false;
    }

    public function getCompanies(): array
    {
        return $this->data['user']['companies'];
    }

    public function getNews(): array
    {
        return $this->data['user']['news'];
    }

    public function getSpots(): array
    {
        return $this->data['user']['spots'];
    }

    public function getLinkDatas(): array
    {
        $results = [];
        if($this->existsCompanies()) {
            foreach($this->getCompanies() as $company) {
                $result['link'] = 'company/' . $company['id'];
                $result['name'] = $company['name'];
                $results[] = $result;
            }
        }

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
