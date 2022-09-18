<?php

namespace Tool\Admin\Application\UseCases\Log;

use Tool\Admin\Domain\Models\Log\LogRepository;

class ShowUseCase
{
    private LogRepository $logRepo;

    public function __construct(
        LogRepository  $logRepo,
    )
    {
        $this->logRepo = $logRepo;
    }

    public function __invoke(int $id): array
    {
        // データを取得する
        $data['log'] = $this->logRepo->show($id);
        $data['isLogShow'] = true;

        // 取得データを返す
        return $data;
    }
}
