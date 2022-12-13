<?php

namespace Tool\General\Domain\Models\Contact;

class CheckMode
{
    private array $data;
    private string $testWord;

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
        if(str_contains($this->getValuesText(), $this->testWord) !== false) return true;

        // なければfalse
        return false;

    }

    public function getValues(): array
    {
        $results = [];
        foreach($this->data['contact'] as $data) {
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

    public function getTitle(): string
    {
        return 'テストモード完了';
    }

    public function getMessage(): string
    {
        return 'テストモードでの処理を行いました。フォームは無事に作動しています。<br>（保存もメール送信もされません）';
    }
}
