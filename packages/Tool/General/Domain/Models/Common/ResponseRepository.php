<?php

namespace Tool\General\Domain\Models\Common;

interface ResponseRepository
{
    /**
     * @param bool $result
     * @param string $message
     * @param array $data
     * @return LogicResponse
     */
    public function makeModel(bool $result, string $title, string $message): LogicResponse;
}
