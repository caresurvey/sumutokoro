<?php

namespace Tool\Admin\Application\UseCases\Tag;

use Tool\Admin\Application\Requests\Tag\DestroyRequest;
use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\Tag\TagRepository;

class DeleteUseCase
{
    private DestroyRequest $request;
    private TagRepository $tagRepo;

    public function __construct(
        destroyRequest $request,
        TagRepository $tagRepo
    )
    {
        $this->tagRepo = $tagRepo;
    }

    public function __invoke(int $id, array $auth): LogicResponse
    {
        // 保存して結果を返す
        return $this->tagRepo->remove($id, $auth);
    }
}
