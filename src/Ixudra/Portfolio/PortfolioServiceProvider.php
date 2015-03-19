<?php namespace Ixudra\Portfolio;


use Illuminate\Support\ServiceProvider;

class PortfolioServiceProvider extends ServiceProvider {

    protected $defer = false;


    public function boot()
    {
        $this->loadViewsFrom(__DIR__ .'/../../resources/views', 'portfolio');

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
