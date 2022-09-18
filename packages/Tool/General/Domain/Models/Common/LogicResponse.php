<?php

namespace Tool\General\Domain\Models\Common;

/**
 * 処理を返すときに使うモデル。
 * 真偽や結果のメッセージを返す
 */
class LogicResponse
{
    /**
     * @var bool
     */
    private $result;

    /**
     * @var string
     */
    private $message;

    /**
     * @param bool $result
     * @param string $message
     * @param array $data
     */
    public function __construct(bool $result, string $title, string $message)
    {
        $this->result = $result;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return [
            'result' => $this->result,
            'message' => $this->message
        ];
    }

    /**
     * @return bool
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}
