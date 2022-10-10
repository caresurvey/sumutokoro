<?php

namespace Tool\Admin\Application\UseCases\User;

use Tool\Admin\Domain\Models\User\UserRepository;
use Tool\Admin\Domain\Models\User\Export;

class ExportUseCase
{
    private UserRepository $userRepo;

    public function __construct(
        UserRepository $userRepo,
    )
    {
        $this->userRepo = $userRepo;
    }

    public function __invoke(): Export
    {
        // データ取得
        return $this->userRepo->export();
    }
}
