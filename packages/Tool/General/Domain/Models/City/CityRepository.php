<?php

namespace Tool\General\Domain\Models\City;

interface CityRepository
{
    public function list(): array;
}