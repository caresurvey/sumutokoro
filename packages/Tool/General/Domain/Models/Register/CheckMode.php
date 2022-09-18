<?php

namespace Tool\General\Domain\Models\Register;

class CheckMode
{
    private $data;
    private $testWord;

    public function __construct(
        array $data
    )
    {
        $this->data = $data;
        $this->testWord = 'istestmode';
    }

    public function data(): array
    {
        return $this->data;
    }

    public function checkTestMode(): bool
    {
        // テストワードがあればtrue
        if(strpos($this->getValuesText(), $this->testWord) !== false) return true;

        // なければfalse
        return false;

    }

    public function getValues(): array
    {
        $results = [];
        foreach($this->data['user'] as $data) {
            if(is_array($data)) {
                $results[] = implode($data);
            } else {
                $results[] = $data;
            }
        }

        return $results;
    }

    public function getValuesText(): string
    {
        return implode($this->getValues());
    }
}
