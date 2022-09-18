<?php

namespace Tool\Admin\Application\UseCases\Spot;

use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\Spot\SpotRepository;

class DisplayUseCase
{
    private SpotRepository $spotRepo;

    public function __construct(SpotRepository $spotRepo)
    {
        $this->spotRepo = $spotRepo;
    }

    public function __invoke(int $id, array $auth): LogicResponse
    {
        // 表示を切り替えて結果を返す
        return $this->spotRepo->display($id, $auth);
    }
}
