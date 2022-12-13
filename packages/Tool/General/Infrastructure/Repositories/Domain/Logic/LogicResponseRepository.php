<?php

namespace Tool\General\Infrastructure\Repositories\Domain\Logic;

use Tool\General\Domain\Models\Common\LogicResponse;
use Tool\General\Domain\Models\Common\ResponseRepository;

class LogicResponseRepository implements ResponseRepository
{
    /**
     * @param bool $result
     * @param string $title
     * @param string $message
     * @return LogicResponse
     */
    public function makeModel(bool $result, string $title, string $message): LogicResponse
    {
        // データをドメインオブジェクトにして返す
        return new LogicResponse(
            $result,
            $title,
            $message,
        );
    }
}
