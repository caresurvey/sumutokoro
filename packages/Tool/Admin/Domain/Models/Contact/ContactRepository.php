<?php

namespace Tool\Admin\Domain\Models\Contact;

interface ContactRepository
{
    public function list(): array;

    public function show(int $id): array;
}
