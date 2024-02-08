<?php

namespace App\Framework\Tools\ShadeFilters;


interface FilterInterface
{
    public function apply(array $array): ?string;
}
