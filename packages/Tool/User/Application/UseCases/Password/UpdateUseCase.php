<?php

namespace Tool\User\Application\UseCases\Password;

use Tool\User\Application\Requests\Password\UpdateRequest;
use Tool\User\Domain\Models\Common\LogicResponse;
use Tool\User\Domain\Models\Password\PasswordRepository;

class UpdateUseCase
{
    private UpdateRequest $request;
    private PasswordRepository $passwordRepo;

    public function __construct(
        UpdateRequest $request,
        PasswordRepository $passwordRepo,
    )
    {
        $this->request = $request;
        $this->passwordRepo = $passwordRepo;
    }

    public function __invoke(array $auth): LogicResponse
    {
        // 二重送信防止
        $this->request->session()->regenerateToken();

        // 保存して結果を返す
        return $this->passwordRepo->update($this->request->all(), $auth);
    }
}
