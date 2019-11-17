<?php

namespace moltox\yabe;

use Illuminate\Support\ServiceProvider;

class YabeServiceProvider extends ServiceProvider {

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {

        $this->app->make('moltox\yabe\Controllers\YabeController');
        $this->loadViewsFrom( __DIR__ . '/views', 'yabe');


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {

        include __DIR__ . '/routes.php';

        $this->publishes([

            __DIR__ . '/config/yabe.php' => config_path('yabe.php')

        ], 'config');

        $this->loadTranslationsFrom(__DIR__ . '/lang', 'yabe');


    }

}
