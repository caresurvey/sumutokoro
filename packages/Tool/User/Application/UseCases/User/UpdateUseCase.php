<?php

namespace Tool\User\Application\UseCases\User;

use Tool\User\Application\Requests\User\UpdateRequest;
use Tool\User\Domain\Models\Common\LogicResponse;
use Tool\User\Domain\Models\User\UserRepository;

class UpdateUseCase
{
    private UpdateRequest $request;
    private UserRepository $userRepo;

    public function __construct(
        UpdateRequest $request,
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
        return $this->userRepo->update($this->request->all(), $auth);
    }
}
