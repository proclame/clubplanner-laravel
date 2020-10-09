<?php

namespace Proclame\Clubplanner;

use Illuminate\Support\ServiceProvider;
use Proclame\Clubplanner\Connection;
use Proclame\Clubplanner\Clubplanner;

class ClubplannerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/clubplanner.php' => config_path('clubplanner.php')
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/clubplanner.php', 'clubplanner');

        $this->app->bind('clubplanner', function ($app) {
            $connection = new Connection();
            $connection->setApiKey(config('clubplanner.clubplanner_token'));
            $connection->setApiUrl(config('clubplanner.clubplanner_url'));
            $connection->connect();

            $clubplanner = new Clubplanner($connection);

            return $clubplanner;
        });
    }

    public function provides()
    {
        return ['clubplanner'];
    }
}
