<?php

namespace Tool\User\Infrastructure\Repositories\Domain\Logic;


use Tool\User\Domain\Models\Common\LogicResponse;
use Tool\User\Domain\Models\Common\ResponseRepository;

class LogicResponseRepository implements ResponseRepository
{
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
