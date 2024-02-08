<?php

namespace App\Framework\Tools\ShadeFilters;

use App\Framework\Tools\ShadeFilters\FilterInterface;
use App\Layers\Persistence\Repository\Colors\File;

class BlueFilter implements FilterInterface
{
    public function apply(array $rgb): ?string
    {
        $blue = File::SHADES[File::BLUE];

        return (
            ($blue['r_min'] < $rgb[0]) && ($rgb[0] < $blue['r_max']) &&
            ($blue['g_min'] < $rgb[1]) && ($rgb[1] < $blue['g_max']) &&
            ($blue['b_min'] < $rgb[2]) && ($rgb[2] < $blue['b_max']) &&
            (($rgb[0] < $rgb[2])  && ($rgb[1] < $rgb[2]))
        ) ? File::BLUE : null;
    }
}
