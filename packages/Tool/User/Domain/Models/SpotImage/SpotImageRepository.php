<?php

namespace Tool\User\Domain\Models\SpotImage;


interface SpotImageRepository
{
    public function save(int $id, array $post, array $auth): bool;

    public function remove(int $id, array $post, array $auth): bool;
}
