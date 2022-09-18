<?php

namespace Tool\Admin\Application\UseCases\User;

use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\User\UserRepository;
use Tool\Admin\Application\Requests\User\StoreRequest;


class StoreUseCase
{
    private StoreRequest $request;
    private UserRepository $userRepo;

    public function __construct(
        StoreRequest $request,
        UserRepository $userRepo,
    )
    {
        $this->request = $request;
        $this->userRepo = $userRepo;
    }

    public function __invoke(array $auth): LogicResponse
    {
        // 二重送信防止
        $this->request->session()->regenerateToken();

        // 保存して結果を返す
        return $this->userRepo->store($this->request->all(), $auth);
    }
}
