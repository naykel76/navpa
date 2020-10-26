<?php

namespace Naykel\Navpa;

use Illuminate\Support\ServiceProvider;

class NavpaServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'navpa');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/http/routes.php');

        // NK:??? Can these be run without publishing?
        $this->publishes(
            [
                // FACTORIES ARE NOT YOUR FRIEND!
                // __DIR__ . '/Database/factories/PageFactory.php' => database_path('/factories/PageFactory.php'),
                // __DIR__ . '/Models/Page.php' => app_path('/Models/Page.php'),
                __DIR__ . '/Database/seeders/PageSeeder.php' => database_path('/seeders/PageSeeder.php'),
            ],
            'navpa-opt'
        );

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/navpa.php', 'navpa');

        // Register the service the package provides.
        $this->app->singleton('navpa', function ($app) {
            return new Navpa;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['navpa'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config/navpa.php' => config_path('navpa.php'),
        ], 'navpa.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/naykel'),
        ], 'navpa.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/naykel'),
        ], 'navpa.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/naykel'),
        ], 'navpa.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
