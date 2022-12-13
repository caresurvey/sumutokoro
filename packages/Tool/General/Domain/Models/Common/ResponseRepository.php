<?php

namespace Tool\General\Domain\Models\Common;

interface ResponseRepository
{
    /**
     * @param bool $result
     * @param string $title
     * @param string $message
     * @return LogicResponse
     */
    public function makeModel(bool $result, string $title, string $message): LogicResponse;
}
