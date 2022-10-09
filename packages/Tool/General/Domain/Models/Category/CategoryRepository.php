<?php

namespace Tool\General\Domain\Models\Category;

interface CategoryRepository
{
    public function list(): array;
}