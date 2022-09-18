<?php

namespace Tool\General\Domain\Models\Prefecture;

interface PrefectureRepository
{
    public function list(): array;
}