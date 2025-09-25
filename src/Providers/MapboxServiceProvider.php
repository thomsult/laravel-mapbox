<?php

namespace Thomsult\LaravelMapbox\Providers;

use Illuminate\Support\ServiceProvider;
use Thomsult\LaravelMapbox\Services\MapboxClient;

class MapboxServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Enregistrer le service dans le container
        $this->app->singleton('mapbox', function ($app) {
            return new MapboxClient();
        });

        // Merger la config
        $this->mergeConfigFrom(
            __DIR__.'/../../config/mapbox.php', 'mapbox'
        );
    }

    public function boot()
    {
        // Publier la config
        $this->publishes([
            __DIR__.'/../../config/mapbox.php' => config_path('mapbox.php'),
        ], 'config');
    }
}