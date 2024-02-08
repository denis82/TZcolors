<?php

namespace App\Layers\Persistence\Repository\Colors;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    const MAIN_COLORS = [
        'red' => '#f00',
        'blue' => '#00f',
        'green' => '#0f0',
        'black' => '#000',
        'yellow' => '#d3e509',
    ];
    const RED = 'red';
    const BLUE = 'blue';
    const GREEN = 'green';
    const BLACK = 'black';
    const YELLOW = 'yellow';

    const SHADES = [
        'red'  => ['r_min' => 83, 'r_max' => 255, 'g_min' => 0, 'g_max' => 72, 'b_min' => 0, 'b_max' => 90],
        'green' => ['r_min' => 6, 'r_max' => 204, 'g_min' => 61, 'g_max' => 255, 'b_min' => 1, 'b_max' => 202],
        'blue'  => ['r_min' => 0, 'r_max' => 149, 'g_min' => 0, 'g_max' => 208, 'b_min' => 58, 'b_max' => 255]
    ];
    const EXCHANGE_COLORS = ['red'  => 'black','green' => 'red','blue'  => 'yellow', 'black' => 'blue'];
    protected $guarded = [];
    use HasFactory;
}
