<?php

namespace App\Framework\Tools\ShadeFilters;

use App\Framework\Tools\ShadeFilters\FilterInterface;
use App\Layers\Persistence\Repository\Colors\File;

class RedFilter implements FilterInterface
{
    public function apply(array $rgb): ?string
    {
        $red = File::SHADES[File::RED];
        return (
            ($red['r_min'] < $rgb[0]) && ($rgb[0] < $red['r_max']) &&
            ($red['g_min'] < $rgb[1]) && ($rgb[1] < $red['g_max']) &&
            ($red['b_min'] < $rgb[2]) && ($rgb[2] < $red['b_max']) &&
            (($rgb[1] < $rgb[0])  && ($rgb[2] < $rgb[0]))
        ) ? File::RED : null;
    }
}
