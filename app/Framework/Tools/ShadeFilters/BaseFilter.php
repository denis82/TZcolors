<?php

namespace App\Framework\Tools\ShadeFilters;


class BaseFilter
{
    public string $color;
    public function handle($q, $next)
    {
        $this->apply($q);

        return $next($q);
    }

}
