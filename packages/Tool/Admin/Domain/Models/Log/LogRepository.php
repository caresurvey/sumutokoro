<?php

namespace Tool\Admin\Domain\Models\Log;

interface LogRepository
{
    public function list(): array;

    public function show(int $id): array;
}
