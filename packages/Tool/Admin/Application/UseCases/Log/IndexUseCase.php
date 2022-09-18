<?php

namespace Tool\Admin\Application\UseCases\Log;

use Tool\Admin\Domain\Models\Log\LogRepository;

class IndexUseCase
{
    private LogRepository $logRepo;

    public function __construct(LogRepository $logRepo)
    {
        $this->logRepo = $logRepo;
    }

    public function __invoke(): array
    {
        return $this->logRepo->list();
    }
}
