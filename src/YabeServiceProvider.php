<?php

namespace moltox\yabe;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class YabeServiceProvider extends ServiceProvider {

    /**
     * Register services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function register() {

        $this->app->make('moltox\yabe\Http\Controllers\YabeController');


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {

        $this->loadViewsFrom( __DIR__ . '/resources/views', 'yabe');

        $this->publishes([ __DIR__ . '/resources/views' => resource_path('views/vendor/yabe')], 'yabe-views');

        $this->publishes([ __DIR__ . '/config/yabe.php' => config_path('yabe.php') ], 'yabe-config');

        $this->publishes([ __DIR__ . '/config/breadcrumbs.php' => config_path('breadcrumbs.php') ], 'breadcrumbs-config');

        $this->publishes([ __DIR__ . '/config/custom_fields.php' => config_path('custom_fields.php') ], 'customfields-config');

        $this->publishes([ __DIR__ . '/resources/lang' => resource_path('lang'), ], 'yabe-lang' );

        $this->publishes([ __DIR__ . '/public' => public_path('moltox/yabe') ], 'public-files' );

        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'yabe');

        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');

        include __DIR__ . '/routes/routes.php';

        include __DIR__ . '/routes/breadcrumbs.php';

        // Using Closure based composers...
        View::composer(

            'yabe::navbar_top.navbar', 'moltox\yabe\Http\View\Composers\MenuComposer'

        );




    }

}
