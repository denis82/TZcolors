<?php

namespace App\Framework\Tools\ShadeFilters;

use App\Framework\Tools\ShadeFilters\FilterInterface;
use App\Layers\Persistence\Repository\Colors\File;

class GreenFilter implements FilterInterface
{
    public function apply(array $rgb): ?string
    {
        $green = File::SHADES[File::GREEN];
        return (
            ($green['r_min'] < $rgb[0]) && ($rgb[0] < $green['r_max']) &&
            ($green['g_min'] < $rgb[1]) && ($rgb[1] < $green['g_max']) &&
            ($green['b_min'] < $rgb[2]) && ($rgb[2] < $green['b_max']) &&
            (($rgb[0] < $rgb[1])  && ($rgb[2] < $rgb[1]))
        ) ? File::GREEN : null;
    }
}
