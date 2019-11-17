ixudra/portfolio
=====================

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ixudra/portfolio.svg?style=flat-square)](https://packagist.org/packages/ixudra/portfolio)
[![license](https://img.shields.io/github/license/ixudra/portfolio.svg)]()
[![Total Downloads](https://img.shields.io/packagist/dt/ixudra/portfolio.svg?style=flat-square)](https://packagist.org/packages/ixudra/portfolio)

Custom PHP portfolio package for the Laravel 6 framework - developed by [Ixudra](http://ixudra.be).

This package can be used by anyone at any given time, but keep in mind that it is optimized for my personal custom workflow. It may not suit your project perfectly and modifications may be in order.



## Installation

Pull this package in through Composer:

```js

    {
        "require": {
            "ixudra/portfolio": "2.*"
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
        Route::get(     'customers',                                array('as' => 'customers.index',                                    'uses' => '\Ixudra\Portfolio\Http\Controllers\CustomerController@index'));
        Route::post(    'customers',                                array('as' => 'customers.index.process',                            'uses' => '\Ixudra\Portfolio\Http\Controllers\CustomerController@index'));
        Route::get(     'customers/create',                         array('as' => 'customers.create',                                   'uses' => '\Ixudra\Portfolio\Http\Controllers\CustomerController@create'));
        Route::post(    'customers',                                array('as' => 'customers.store',                                    'uses' => '\Ixudra\Portfolio\Http\Controllers\CustomerController@store'));
        Route::get(     'customers/{id}',                           array('as' => 'customers.show',                                     'uses' => '\Ixudra\Portfolio\Http\Controllers\CustomerController@show'));
        Route::get(     'customers/{id}/edit',                      array('as' => 'customers.edit',                                     'uses' => '\Ixudra\Portfolio\Http\Controllers\CustomerController@edit'));
        Route::put(     'customers/{id}',                           array('as' => 'customers.edit.process',                             'uses' => '\Ixudra\Portfolio\Http\Controllers\CustomerController@update'));
        Route::delete(  'customers/{id}',                           array('as' => 'customers.delete',                                   'uses' => '\Ixudra\Portfolio\Http\Controllers\CustomerController@destroy'));
        Route::get(     'customers/filter',                         array('as' => 'customers.filter',                                   'uses' => '\Ixudra\Portfolio\Http\Controllers\CustomerController@filter'));
        Route::post(    'customers/filter',                         array('as' => 'customers.filter.process',                           'uses' => '\Ixudra\Portfolio\Http\Controllers\CustomerController@filter'));

        Route::get(     'projects',                                 array('as' => 'projects.index',                                     'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectController@index'));
        Route::post(    'projects',                                 array('as' => 'projects.index.process',                             'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectController@index'));
        Route::get(     'projects/create',                          array('as' => 'projects.create',                                    'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectController@create'));
        Route::post(    'projects',                                 array('as' => 'projects.store',                                     'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectController@store'));
        Route::get(     'projects/{id}',                            array('as' => 'projects.show',                                      'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectController@show'));
        Route::get(     'projects/{id}/edit',                       array('as' => 'projects.edit',                                      'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectController@edit'));
        Route::put(     'projects/{id}',                            array('as' => 'projects.edit.process',                              'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectController@update'));
        Route::delete(  'projects/{id}',                            array('as' => 'projects.delete',                                    'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectController@destroy'));
        Route::get(     'projects/filter',                          array('as' => 'projects.filter',                                    'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectController@filter'));
        Route::post(    'projects/filter',                          array('as' => 'projects.filter.process',                            'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectController@filter'));

        Route::get(     'project-types',                            array('as' => 'projectTypes.index',                                 'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectTypeController@index'));
        Route::post(    'project-types',                            array('as' => 'projectTypes.index.process',                         'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectTypeController@index'));
        Route::get(     'project-types/create',                     array('as' => 'projectTypes.create',                                'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectTypeController@create'));
        Route::post(    'project-types',                            array('as' => 'projectTypes.store',                                 'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectTypeController@store'));
        Route::get(     'project-types/{id}',                       array('as' => 'projectTypes.show',                                  'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectTypeController@show'));
        Route::get(     'project-types/{id}/edit',                  array('as' => 'projectTypes.edit',                                  'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectTypeController@edit'));
        Route::put(     'project-types/{id}',                       array('as' => 'projectTypes.edit.process',                          'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectTypeController@update'));
        Route::delete(  'project-types/{id}',                       array('as' => 'projectTypes.delete',                                'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectTypeController@destroy'));
        Route::get(     'project-types/filter',                     array('as' => 'projectTypes.filter',                                'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectTypeController@filter'));
        Route::post(    'project-types/filter',                     array('as' => 'projectTypes.filter.process',                        'uses' => '\Ixudra\Portfolio\Http\Controllers\ProjectTypeController@filter'));

        Route::get(     'addresses',                                array('as' => 'addresses.index',                                    'uses' => '\Ixudra\Portfolio\Http\Controllers\AddressController@index'));
        Route::post(    'addresses',                                array('as' => 'addresses.index.process',                            'uses' => '\Ixudra\Portfolio\Http\Controllers\AddressController@index'));
        Route::get(     'addresses/create',                         array('as' => 'addresses.create',                                   'uses' => '\Ixudra\Portfolio\Http\Controllers\AddressController@create'));
        Route::post(    'addresses',                                array('as' => 'addresses.store',                                    'uses' => '\Ixudra\Portfolio\Http\Controllers\AddressController@store'));
        Route::get(     'addresses/{id}',                           array('as' => 'addresses.show',                                     'uses' => '\Ixudra\Portfolio\Http\Controllers\AddressController@show'));
        Route::get(     'addresses/{id}/edit',                      array('as' => 'addresses.edit',                                     'uses' => '\Ixudra\Portfolio\Http\Controllers\AddressController@edit'));
        Route::put(     'addresses/{id}',                           array('as' => 'addresses.edit.process',                             'uses' => '\Ixudra\Portfolio\Http\Controllers\AddressController@update'));
        Route::delete(  'addresses/{id}',                           array('as' => 'addresses.delete',                                   'uses' => '\Ixudra\Portfolio\Http\Controllers\AddressController@destroy'));
        Route::get(     'addresses/filter',                         array('as' => 'addresses.filter',                                   'uses' => '\Ixudra\Portfolio\Http\Controllers\AddressController@filter'));
        Route::post(    'addresses/filter',                         array('as' => 'addresses.filter.process',                           'uses' => '\Ixudra\Portfolio\Http\Controllers\AddressController@filter'));

        Route::get(     'people',                                   array('as' => 'people.index',                                       'uses' => '\Ixudra\Portfolio\Http\Controllers\PeopleController@index'));
        Route::post(    'people',                                   array('as' => 'people.index.process',                               'uses' => '\Ixudra\Portfolio\Http\Controllers\PeopleController@index'));
        Route::get(     'people/create',                            array('as' => 'people.create',                                      'uses' => '\Ixudra\Portfolio\Http\Controllers\PeopleController@create'));
        Route::post(    'people',                                   array('as' => 'people.store',                                       'uses' => '\Ixudra\Portfolio\Http\Controllers\PeopleController@store'));
        Route::get(     'people/{id}',                              array('as' => 'people.show',                                        'uses' => '\Ixudra\Portfolio\Http\Controllers\PeopleController@show'));
        Route::get(     'people/{id}/edit',                         array('as' => 'people.edit',                                        'uses' => '\Ixudra\Portfolio\Http\Controllers\PeopleController@edit'));
        Route::put(     'people/{id}',                              array('as' => 'people.edit.process',                                'uses' => '\Ixudra\Portfolio\Http\Controllers\PeopleController@update'));
        Route::delete(  'people/{id}',                              array('as' => 'people.delete',                                      'uses' => '\Ixudra\Portfolio\Http\Controllers\PeopleController@destroy'));
        Route::get(     'people/filter',                            array('as' => 'people.filter',                                      'uses' => '\Ixudra\Portfolio\Http\Controllers\PersonController@filter'));
        Route::post(    'people/filter',                            array('as' => 'people.filter.process',                              'uses' => '\Ixudra\Portfolio\Http\Controllers\PersonController@filter'));

        Route::get(     'companies',                                array('as' => 'companies.index',                                    'uses' => '\Ixudra\Portfolio\Http\Controllers\CompanyController@index'));
        Route::post(    'companies',                                array('as' => 'companies.index.process',                            'uses' => '\Ixudra\Portfolio\Http\Controllers\CompanyController@index'));
        Route::get(     'companies/create',                         array('as' => 'companies.create',                                   'uses' => '\Ixudra\Portfolio\Http\Controllers\CompanyController@create'));
        Route::post(    'companies',                                array('as' => 'companies.store',                                    'uses' => '\Ixudra\Portfolio\Http\Controllers\CompanyController@store'));
        Route::get(     'companies/{id}',                           array('as' => 'companies.show',                                     'uses' => '\Ixudra\Portfolio\Http\Controllers\CompanyController@show'));
        Route::get(     'companies/{id}/edit',                      array('as' => 'companies.edit',                                     'uses' => '\Ixudra\Portfolio\Http\Controllers\CompanyController@edit'));
        Route::put(     'companies/{id}',                           array('as' => 'companies.edit.process',                             'uses' => '\Ixudra\Portfolio\Http\Controllers\CompanyController@update'));
        Route::delete(  'companies/{id}',                           array('as' => 'companies.delete',                                   'uses' => '\Ixudra\Portfolio\Http\Controllers\CompanyController@destroy'));
        Route::get(     'companies/filter',                         array('as' => 'companies.filter',                                   'uses' => '\Ixudra\Portfolio\Http\Controllers\CompanyController@filter'));
        Route::post(    'companies/filter',                         array('as' => 'companies.filter.process',                           'uses' => '\Ixudra\Portfolio\Http\Controllers\CompanyController@filter'));
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




## Support

Help me further develop and maintain this package by supporting me via [Patreon](https://www.patreon.com/ixudra)!!




## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)




## Contact

For package questions, bug, suggestions and/or feature requests, please use the Github issue system and/or submit a pull request. When submitting an issue, always provide a detailed explanation of your problem, any response or feedback your get, log messages that might be relevant as well as a source code example that demonstrates the problem. If not, I will most likely not be able to help you with your problem. Please review the [contribution guidelines](https://github.com/ixudra/portfolio/blob/master/CONTRIBUTING.md) before submitting your issue or pull request.

For any other questions, feel free to use the credentials listed below: 

Jan Oris (developer)

- Email: jan.oris@ixudra.be
- Telephone: +32 496 94 20 57

