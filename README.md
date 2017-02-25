ixudra/portfolio
=====================

Custom PHP portfolio package for the Laravel 5 framework - developed by [Ixudra](http://ixudra.be).

This package can be used by anyone at any given time, but keep in mind that it is optimized for my personal custom workflow. It may not suit your project perfectly and modifications may be in order.



## Installation

Pull this package in through Composer:

```js

    {
        "require": {
            "ixudra/portfolio": "0.*"
        }
    }

```

Add the service provider to your `config/app.php` file. Additionally, you will also need to include the service providers of the package dependencies:

```php

    'providers'         => array(

        //...

        Collective\Html\HtmlServiceProvider::class,
        Ixudra\Portfolio\PortfolioServiceProvider::class,
        Ixudra\Translation\TranslationServiceProvider::class,
        Ixudra\Imageable\ImageableServiceProvider::class,

    ),

```

Though the package does not have a facade on itself, it does rely on several facades of dependencies in order to function correctly. You will need to add these to your `config/app.php` file as well:

```php

    'facades'       => array(

        //...

        'HTML'              => Collective\Html\HtmlFacade::class,
        'Form'              => Collective\Html\FormFacade::class,
        'Translate'         => Ixudra\Translation\Facades\Translation::class,

    ),

```

Note that these facades are only required if you would like to use the package as it comes out of the box. It is not strictly mandatory to use these facades in order to leverage the package. It is possible to use it without them, though it would require a great deal of customisation on your part.

Run package migrations using artisan:

```php

    // Run the migration for the ixudra/portfolio package
    php artisan migrate --package="ixudra/portfolio"

    // Run the migration for the ixudra/imageable package
    php artisan migrate --package="ixudra/imageable"

```

Alternatively, you can also publish the migrations using artisan:

```php

    // Publish all resources from all packages
    php artisan vendor:publish

    // Publish only the resources of the package
    php artisan vendor:publish --provider="Ixudra\\Portfolio\\PortfolioServiceProvider" --tag="migrations"

    // Publish only the resources of ixudra/imageable package
    php artisan vendor:publish --provider="Ixudra\\Imageable\\ImageableServiceProvider" --tag="migrations"

```

Register the routes for the application with the correct middleware and/or prefix applied to them:

```php

    Route::group(array('middleware' => array('web', 'auth')), function()
    {
        Route::get(     'customers/filter',                         array('as' => 'customers.filter',                        'uses' => '\Ixudra\Portfolio\Http\Controllers\CustomerController@filter'));
        Route::post(    'customers/filter',                         array('as' => 'customers.filter.process',                'uses' => '\Ixudra\Portfolio\Http\Controllers\CustomerController@filter'));
        Route::resource('customers', '\Ixudra\Portfolio\Http\Controllers\CustomerController');

        Route::get(     'projects/filter',                          array('as' => 'projects.filter',                        'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectController@filter'));
        Route::post(    'projects/filter',                          array('as' => 'projects.filter.process',                'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectController@filter'));
        Route::resource('projects', '\Ixudra\Portfolio\Http\Controllers\ProjectController');

        Route::get(     'projectTypes/filter',                      array('as' => 'projectTypes.filter',                    'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectTypeController@filter'));
        Route::post(    'projectTypes/filter',                      array('as' => 'projectTypes.filter.process',            'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectTypeController@filter'));
        Route::resource('projectTypes', '\Ixudra\Portfolio\Http\Controllers\ProjectTypeController');

        Route::get(     'addresses/filter',                         array('as' => 'addresses.filter',                       'uses' => '\Ixudra\Portfolio\Http\Controllers\AddressController@filter'));
        Route::post(    'addresses/filter',                         array('as' => 'addresses.filter.process',               'uses' => '\Ixudra\Portfolio\Http\Controllers\AddressController@filter'));
        Route::resource('addresses', '\Ixudra\Portfolio\Http\Controllers\AddressController');

        Route::get(     'people/filter',                            array('as' => 'people.filter',                          'uses' => '\Ixudra\Portfolio\Http\Controllers\PersonController@filter'));
        Route::post(    'people/filter',                            array('as' => 'people.filter.process',                  'uses' => '\Ixudra\Portfolio\Http\Controllers\PersonController@filter'));
        Route::resource('people', '\Ixudra\Portfolio\Http\Controllers\PersonController');

        Route::get(     'companies/filter',                         array('as' => 'companies.filter',                       'uses' => '\Ixudra\Portfolio\Http\Controllers\CompanyController@filter'));
        Route::post(    'companies/filter',                         array('as' => 'companies.filter.process',               'uses' => '\Ixudra\Portfolio\Http\Controllers\CompanyController@filter'));
        Route::resource('companies', '\Ixudra\Portfolio\Http\Controllers\CompanyController');
    });

```

In a normal installation, only the routes belonging to the `CustomerController`, `ProjectController` and the `ProjectTypeController` must be registered. All other resources are used and accessed through these routes. However, they can be added as well if necessary for your app.

Register the model observers in the `register()` method of the `AppServiceProvider`:

```php

    /**
     * Model observers
     */

    \Ixudra\Portfolio\Models\Company::observe( new \Ixudra\Portfolio\Observers\CustomerModelObserver() );
    \Ixudra\Portfolio\Models\Person::observe( new \Ixudra\Portfolio\Observers\CustomerModelObserver() );

```



## Usage

Once all dependencies have been included and migrations have been run, you can start using the package. Out of the box, the package provides you with two resourceful controllers (`ProjectController` and `CustomerController`) that can be accessed. The routes provided by these controllers are automatically included via the package service provider and can be accessed out of the box. If necessary you can use the following example to make links to the index pages provided by these controllers:

```php

    // Controller is accessible via the url http://yourAppName/customers
    <li>{!! HTML::linkRoute('customers.index', Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'customer'))) !!}</li>

    // Controller is accessible via the url http://yourAppName/projects
    <li>{!! HTML::linkRoute('projects.index', Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'project'))) !!}</li>

    // Controller is accessible via the url http://yourAppName/projectTypes
    <li>{!! HTML::linkRoute('projectTypes.index', Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'projectType'))) !!}</li>

```


### Extending the package

Coming soon!




## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)




## Contact

Jan Oris (developer)

- Email: jan.oris@ixudra.be
- Telephone: +32 496 94 20 57

