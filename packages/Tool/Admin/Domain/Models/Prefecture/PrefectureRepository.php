<?php

namespace Tool\Admin\Domain\Models\Prefecture;

interface PrefectureRepository
{
    public function list(): array;
}
