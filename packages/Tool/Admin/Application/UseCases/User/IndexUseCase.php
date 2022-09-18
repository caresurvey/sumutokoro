<?php

namespace Tool\Admin\Application\UseCases\User;

use Tool\Admin\Application\Requests\User\IndexRequest;
use Tool\Admin\Domain\Models\User\UserRepository;

class IndexUseCase
{
    private IndexRequest $request;
    private UserRepository $userRepo;

    public function __construct(
        IndexRequest $request,
        UserRepository $userRepo
    )
    {
        $this->userRepo = $userRepo;
        $this->request = $request;
    }

    public function __invoke(array $auth): array
    {
        $data = $this->userRepo->list($this->request, $auth);
        $data['count'] = $this->userRepo->count();

        return $data;
    }
}
