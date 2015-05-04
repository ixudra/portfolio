<?php namespace Ixudra\Portfolio;


use Illuminate\Support\ServiceProvider;

class PortfolioServiceProvider extends ServiceProvider {

    protected $defer = false;


    public function boot()
    {
        $this->loadTranslationsFrom( __DIR__ .'/../../resources/lang', 'portfolio' );
        $this->loadViewsFrom( __DIR__ .'/../../resources/views', 'portfolio' );

        $this->mergeConfigFrom(
            __DIR__ .'/../../config/international.php', 'international'
        );

        // Publish language files
        $this->publishes(array(
            __DIR__ .'/../../resources/lang' => base_path('resources/lang'),
        ));

        // Publish views
        $this->publishes(array(
            __DIR__ .'/../../resources/views' => base_path('resources/views/bootstrap'),
        ));

        // Publish migrations
        $this->publishes(array(
            __DIR__ .'/../../database/migrations/' => base_path('database/migrations')
        ), 'migrations');

        // Publish configuration files
        $this->publishes([
            __DIR__ .'/../../config/international.php' => config_path('international.php')
        ], 'config');

        // Load package routes
        include __DIR__ .'/../../routes.php';
        include __DIR__ .'/../../bindings.php';
    }

    public function register()
    {
        //
    }

    public function provides()
    {
        return array('portfolio');
    }

}
