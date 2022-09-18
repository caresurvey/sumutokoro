<?php

namespace Tool\Admin\Infrastructure\Repositories\Domain\Logic;


use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\Common\ResponseRepository;

class LogicResponseRepository implements ResponseRepository
{
    /**
     * @param bool $result
     * @param string $message
     * @param array $data
     * @return LogicResponse
     */
    public function makeModel(bool $result, string $title, string $message = '', array $data = []): LogicResponse
    {
        // データをドメインオブジェクトにして返す
        return new LogicResponse(
            $result,
            $title,
            $message,
            $data
        );
    }
}
