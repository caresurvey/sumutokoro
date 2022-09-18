<?php

namespace Tool\Admin\Application\UseCases\Contact;

use Tool\Admin\Domain\Models\Contact\ContactRepository;

class ShowUseCase
{
    private ContactRepository $contactRepo;

    public function __construct(
        ContactRepository  $contactRepo,
    )
    {
        $this->contactRepo = $contactRepo;
    }

    public function __invoke(int $id): array
    {
        // データを取得する
        $data['contact'] = $this->contactRepo->show($id);
        $data['isContactShow'] = true;

        // 取得データを返す
        return $data;
    }
}
