<?php namespace Ixudra\Portfolio;


use Illuminate\Support\ServiceProvider;

class PortfolioServiceProvider extends ServiceProvider {

    protected $defer = false;


    public function boot()
    {
        $this->loadTranslationsFrom( __DIR__ .'/../../resources/lang', 'portfolio' );
        $this->loadViewsFrom( __DIR__ .'/../../resources/views', 'portfolio' );

        // Publish your language files
        $this->publishes(array(
            __DIR__ .'/../../resources/lang' => base_path('resources/lang'),
        ));

        // Publish your views
        $this->publishes(array(
            __DIR__ .'/../../resources/views' => base_path('resources/views/bootstrap'),
        ));

        // Publish your migrations
        $this->publishes(array(
            __DIR__ .'/../../database/migrations/' => base_path('database/migrations')
        ), 'migrations');


        include __DIR__.'/../../routes.php';
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
