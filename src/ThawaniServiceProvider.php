<?php

namespace S4D\Laravel\Thawani;

use Illuminate\Support\ServiceProvider;

class ThawaniServiceProvider extends ServiceProvider {
    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'ThawaniLaravel');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    public function register(){
    }

}
