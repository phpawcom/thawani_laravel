<?php

namespace S4D\Laravel\Thawani;

use Illuminate\Support\ServiceProvider;
use S4D\Laravel\Thawani\Services\ThawaniService;

class ThawaniServiceProvider extends ServiceProvider {
    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'ThawaniLaravel');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->mergeConfigFrom(__DIR__.'/config/thawani.php', 'thawani');
        $this->publishes([
            __DIR__.'/config/thawani.php' => config_path('thawani.php')
        ]);
    }

    public function register(){
        $this->app->bind('Thawani', fn() => new ThawaniService());
    }

}
