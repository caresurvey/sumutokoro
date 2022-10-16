<?php

namespace Tool\Admin\Domain\Models\SpotIconGenreComment;

class EditData
{
    private array $data;

    public function __construct(
        array $data
    )
    {
        $this->data = $data;
    }

    public function getFillData(string $serial): array
    {
        if(empty($this->data[$serial])) return [];

        return $this->data[$serial];
    }

    public function getId(string $serial): int
    {
        if(empty($this->data[$serial])) return 1;

        return $this->data[$serial]['id'];
    }

    public function getComment(string $serial): string
    {
        if(empty($this->data[$serial])) return '';

        return $this->data[$serial]['comment'];
    }

}
