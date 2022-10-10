<?php

namespace Tool\Admin\Domain\Models\Spot;

use Tool\Admin\Domain\Models\Common\LogicResponse;
use Tool\Admin\Domain\Models\Spot\Export\ExportGeneral;

interface SpotRepository
{
    public function list(SpotSearch $search, array $auth): array;

    public function store(array $request, array $emptyData, array $auth): LogicResponse;

    public function edit(int $id, array $auth): array;

    public function update(array $request, array $auth): LogicResponse;

    public function display(int $id, array $auth): LogicResponse;

    public function remove(int $id, array $auth): LogicResponse;

    public function count(): int;

    public function keyword_selected(array $request): array;

    public function export(): ExportGeneral;
}
