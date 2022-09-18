<?php

namespace Tool\Admin\Domain\Models\Common;

/**
 * 処理を返すときに使うモデル。
 * 真偽や結果のメッセージを返す
 */
class LogicResponse
{
    /**
     * @var bool
     */
    private Bool $result;

    /**
     * @var string
     */
    private String $title;

    /**
     * @var string
     */
    private String $message;

    /**
     * @var array
     */
    private array $data;

    /**
     * @param bool $result
     * @param string $title
     * @param string $message
     * @param array $data
     */
    public function __construct(bool $result, string $title, string $message, array $data = [])
    {
        $this->result = $result;
        $this->title = $title;
        $this->message = $message;
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return [
            'result' => $this->result,
            'title' => $this->title,
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

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    public function getBackLink(): string
    {
        return config('myapp.app_admin_prefix') . '/' . $this->data['backlink'];
    }
}
