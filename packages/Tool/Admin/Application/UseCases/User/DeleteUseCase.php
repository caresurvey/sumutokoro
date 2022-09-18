<?php

namespace Tool\Admin\Application\UseCases\User;

use Tool\Admin\Application\Requests\User\DestroyRequest;
use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\User\UserRepository;

class DeleteUseCase
{
    private DestroyRequest $request;
    private UserRepository $userRepo;

    public function __construct(
        destroyRequest $request,
        UserRepository $userRepo
    )
    {
        $this->userRepo = $userRepo;
    }

    public function __invoke(int $id, array $auth): LogicResponse
    {
        // 保存して結果を返す
        return $this->userRepo->remove($id, $auth);
    }
}
