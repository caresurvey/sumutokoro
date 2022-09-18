<?php

namespace Tool\Admin\Application\UseCases\User;

use Tool\Admin\Application\Requests\User\UpdateRequest;
use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\User\UserRepository;

class UpdateUseCase
{
    private UpdateRequest $request;
    private UserRepository $userRepo;

    /**
     * @param UpdateRequest $request
     * @param UserRepository $userRepo
     */
    public function __construct(
        UpdateRequest $request,
        UserRepository $userRepo,
    )
    {
        $this->request = $request;
        $this->userRepo = $userRepo;
    }

    /**
     * @param array $auth
     * @return bool
     */
    public function __invoke(array $auth): LogicResponse
    {
        // 二重送信防止
        $this->request->session()->regenerateToken();

        // 保存して結果を返す
        return $this->userRepo->update($this->request->all(), $auth);
    }
}
