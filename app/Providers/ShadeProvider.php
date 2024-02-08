<?php

namespace App\Providers;

use App\Framework\Tools\ShadeFilters\BlueFilter;
use App\Framework\Tools\ShadeFilters\GreenFilter;
use App\Framework\Tools\ShadeFilters\RedFilter;
use Illuminate\Support\ServiceProvider;
use App\Framework\Tools\ShadePipe\Shade;

class ShadeProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Shade::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        app(Shade::class)->regFilters([
            new RedFilter(),
            new GreenFilter(),
            new BlueFilter()
        ]);
    }
}
