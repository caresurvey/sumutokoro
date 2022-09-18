<?php

namespace Tool\Admin\Application\UseCases\Contact;

use Tool\Admin\Domain\Models\Contact\ContactRepository;

class IndexUseCase
{
    private ContactRepository $contactRepo;

    public function __construct(ContactRepository $contactRepo)
    {
        $this->contactRepo = $contactRepo;
    }

    public function __invoke(): array
    {
        return $this->contactRepo->list();
    }
}
