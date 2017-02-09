<?php namespace Ixudra\Portfolio;


use Illuminate\Support\ServiceProvider;

class PortfolioServiceProvider extends ServiceProvider {

    protected $defer = false;


    public function register()
    {
        // Publish configuration files
        $this->mergeConfigFrom( __DIR__ .'/../../config/international.php', 'international' );
        $this->mergeConfigFrom( __DIR__ .'/../../config/bindings.php', 'bindings' );

        $this->publishes(array(
            __DIR__ .'/../../config/bindings.php'           => config_path('bindings.php'),
            __DIR__ .'/../../config/international.php'      => config_path('international.php'),
        ), 'config');
    }

    public function boot()
    {
        $this->loadTranslationsFrom( __DIR__ .'/../../resources/lang', 'portfolio' );
        $this->loadViewsFrom( __DIR__ .'/../../resources/views', 'portfolio' );


        // Publish language files
        $this->publishes(array(
            __DIR__ .'/../../resources/lang'                => base_path('resources/lang'),
        ), 'lang');


        // Publish views
        $this->publishes(array(
            __DIR__ .'/../../resources/views'               => base_path('resources/views/bootstrap'),
        ), 'views');


        // Publish migrations
        $this->publishes(array(
            __DIR__ .'/../../database/migrations/'          => base_path('database/migrations')
        ), 'migrations');


        // Load package routes
        include __DIR__ .'/../../routes.php';
        include __DIR__ .'/../../bindings.php';
    }

    public function provides()
    {
        return array('portfolio');
    }

}
