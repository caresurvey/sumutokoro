<?php

namespace Tool\Common\Domain\Models\Book;

interface BookRepository
{
    public function makePreview(int $id, string $token, array $categories, array $cities): string;
}
