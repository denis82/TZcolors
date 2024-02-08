<?php

namespace App\Framework\Providers;

use App\Framework\Di\Colors;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        foreach ((new Colors)() as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }
}
