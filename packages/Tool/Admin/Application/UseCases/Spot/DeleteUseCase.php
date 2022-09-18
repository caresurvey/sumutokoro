<?php

namespace Tool\Admin\Application\UseCases\Spot;

use Tool\Admin\Application\Requests\Spot\DestroyRequest;
use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\Spot\SpotRepository;

class DeleteUseCase
{
    private DestroyRequest $request;
    private SpotRepository $spotRepo;

    public function __construct(
        destroyRequest $request,
        SpotRepository $spotRepo
    )
    {
        $this->spotRepo = $spotRepo;
    }

    public function __invoke(int $id, array $auth): LogicResponse
    {
        // 保存して結果を返す
        return $this->spotRepo->remove($id, $auth);
    }
}
