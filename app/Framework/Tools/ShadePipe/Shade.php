<?php

namespace App\Framework\Tools\ShadePipe;


class Shade
{
    private array $filters = [];


    public function regFilters(array $filters): void
    {
        $this->filters = $filters;
    }

    public function filters(): array
    {
        return $this->filters;
    }
}
