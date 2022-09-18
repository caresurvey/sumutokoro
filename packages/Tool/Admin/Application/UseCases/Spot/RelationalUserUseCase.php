<?php

namespace Tool\Admin\Application\UseCases\Spot;

use Tool\Admin\Application\Requests\Spot\RelationalUserRequest;
use Tool\Admin\Domain\Models\Spot\SpotRepository;

class RelationalUserUseCase
{
    private RelationalUserRequest $request;
    private SpotRepository $spotRepo;

    public function __construct(
        RelationalUserRequest $request,
        spotRepository $spotRepo,
    )
    {
        $this->request = $request;
        $this->spotRepo = $spotRepo;
    }

    public function __invoke(): array
    {
        // データを取得して返す
        return $this->spotRepo->keyword_selected($this->request->all());
    }
}
