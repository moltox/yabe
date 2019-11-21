<?php

namespace moltox\yabe;

use Illuminate\Support\ServiceProvider;

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class YabeServiceProvider extends ServiceProvider {

    /**
     * Register services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function register() {

        $this->app->make('moltox\yabe\Controllers\YabeController');
        $this->loadViewsFrom( __DIR__ . '/../views', 'yabe');

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {

        $this->publishes([ __DIR__ . '/config/yabe.php' => config_path('yabe.php') ], 'yabe-config');

        $this->publishes([ __DIR__ . '/config/breadcrumbs.php' => config_path('breadcrumbs.php') ], 'breadcrumbs-config');

        $this->loadTranslationsFrom(__DIR__ . '/lang', 'yabe');

        $this->loadMigrationsFrom(__DIR__ . '/migrations');

        include __DIR__ . '/routes/routes.php';

        include __DIR__ . '/routes/breadcrumbs.php';

    }



}
